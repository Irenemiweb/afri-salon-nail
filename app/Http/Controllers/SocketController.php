<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Ratchet\MessageComponentInterface;

use Ratchet\ConnectionInterface;

use App\Models\User;

use App\Models\Chat;

use App\Models\Chat_request;

// use Auth;
use Illuminate\Support\Facades\Auth;





class SocketController extends Controller implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);

        if(isset($queryarray['token']))
        {
            User::where('token', $queryarray['token'])->update([ 'connection_id' => $conn->resourceId, 'user_status' => 'Online' ]);

            $user_id = User::select('id')->where('token', $queryarray['token'])->get();

            $data['id'] = $user_id[0]->id;

            $data['status'] = 'Online';

            foreach($this->clients as $client)
            {
                if($client->resourceId != $conn->resourceId)
                {
                    $client->send(json_encode($data));
                }
            }

        }

    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $usuario_conectado = Auth::id();
        $chat_delete_id='';
        if(preg_match('~[^\x20-\x7E\t\r\n]~', $msg) > 0)
        {
            //receiver image in binary string message

            $image_name = time() . '.jpg';
            if($image_name){
                file_put_contents(public_path('storage/') . $image_name, $msg);

                $send_data['image_link'] = $image_name;

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $conn->resourceId)
                    {
                        $client->send(json_encode($send_data));
                    }
                }
            }

        }

        $data = json_decode($msg);

        if(isset($data->type))
        {
            if($data->type == 'request_load_unconnected_user')
            {
                $user_data = User::select('id', 'name', 'user_status', 'profile_photo_path', 'email')
                                    ->where('id', '!=', $data->from_user_id)
                                    // ->where('id', '!=', $usuario_conectado->id)
                                    ->orderBy('name', 'ASC')
                                    ->get();

                $sub_data = array();

                foreach($user_data as $row)
                {
                    $sub_data[] = array(
                        'name'      =>  $row['name'],
                        'id'        =>   $row['id'],
                        'status'    =>  $row['user_status'],
                        'user_image'=>  $row['profile_photo_path'],
                        'email' => $row['email']
                    );
                }

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                $send_data['data'] = $sub_data;

                $send_data['response_load_unconnected_user'] = true;

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $client->send(json_encode($send_data));
                    }
                }
            }

            if($data->type == 'request_search_user')
            {
                $user_data = User::select('id', 'name', 'user_status', 'profile_photo_path', 'email')
                                    ->where('id', '!=', $data->from_user_id)
                                    ->where('name', 'like', '%'.$data->search_query.'%')
                                    ->orderBy('name', 'ASC')
                                    ->get();

                $sub_data = array();

                foreach($user_data as $row)
                {

                    $chat_request = Chat_request::select('id')
                                    ->where(function($query) use ($data, $row){
                                        $query->where('from_user_id', $data->from_user_id)->where('to_user_id', $row->id);
                                    })
                                    ->orWhere(function($query) use ($data, $row){
                                        $query->where('from_user_id', $row->id)->where('to_user_id', $data->from_user_id);
                                    })->get();

                    /*
                    SELECT id FROM chat_request
                    WHERE (from_user_id = $data->from_user_id AND to_user_id = $row->id)
                    OR (from_user_id = $row->id AND to_user_id = $data->from_user_id)
                    */

                    if($chat_request->count() == 0)
                    {
                        $sub_data[] = array(
                            'name'  =>  $row['name'],
                            'id'    =>  $row['id'],
                            'status'=>  $row['user_status'],
                            'user_image' => $row['profile_photo_path'],
                            'chat_delete_id' => $chat_request->id,
                            'email' =>$row['email']
                        );
                    }

                }

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                $send_data['data'] = $sub_data;

                $send_data['response_search_user'] = true;

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $client->send(json_encode($send_data));
                    }
                }
            }
            //---------------------------------------
            if ($data->type == 'delete_chat')
            {
                $chatId = $data->chat_id;

                // Buscar el chat basado en el ID proporcionado
                $chat_delete = Chat_request::find($chatId);

                if ($chat_delete) {
                    $usuario_conectado = $data->usuario_conectado;
                    $from_user_id = $data->from_user_id;
                    $to_user_id = $data->to_user_id;

                    if ($usuario_conectado === $from_user_id) {
                        $chat_delete->delete_chat_from = $usuario_conectado;
                    } elseif ($usuario_conectado === $to_user_id) {
                        $chat_delete->delete_chat_to = $usuario_conectado;
                    }
                    $chat_delete->save();
                    //si los dos han borrado el chat lo eliminamos todo de la base de datos
                    if($chat_delete->delete_chat_from != 0 && $chat_delete->delete_chat_to != 0){
                        Chat::where('id_chat', $chat_delete->id)->delete();
                        Chat_request::where('id', $chat_delete->id)->delete();
                    }

                } else {
                    // Manejo si el chat no se encuentra
                    // Puedes retornar un mensaje de error o realizar otras acciones según tu lógica de aplicación
                }


                $senderConnectionId = User::select('connection_id')
                                          ->where('id', $data->from_user_id)
                                          ->first();

                $receiverConnectionId = User::select('connection_id')
                                            ->where('id', $data->to_user_id)
                                            ->first();

                // Preparar datos a enviar a los clientes conectados
                $sendData['response_process_chat_request'] = true;

                foreach ($this->clients as $client) {
                    if ($client->resourceId == $senderConnectionId->connection_id) {
                        $sendData['user_id'] = $data->from_user_id;
                        // $sendData['chat_delete_id'] = $data->chat_id;
                    }

                    if ($client->resourceId == $receiverConnectionId->connection_id) {
                        $sendData['user_id'] = $data->to_user_id;
                        // $sendData['chat_delete_id'] = $data->chat_id;
                    }

                    // Enviar datos a los clientes
                    $client->send(json_encode($sendData));
                }
            }

            //-----------------------------------
            if($data->type == 'request_chat_user')
            {
                $chat_request = new Chat_request;

                $chat_request->from_user_id = $data->from_user_id;

                $chat_request->to_user_id = $data->to_user_id;

                $chat_request->status = 'Pending';

                $chat_request->save();
                $chat_delete_id = $chat_request->id;

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                $receiver_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['response_from_user_chat_request'] = true;
                        $send_data['chat_delete_id'] = $chat_request->id;
                        $client->send(json_encode($send_data));
                    }

                    if($client->resourceId == $receiver_connection_id[0]->connection_id)
                    {
                        $send_data['user_id'] = $data->to_user_id;
                        $send_data['chat_delete_id'] = $chat_request->id;
                        $send_data['response_to_user_chat_request'] = true;

                        $client->send(json_encode($send_data));
                    }
                }
            }

            if($data->type == 'request_load_unread_notification')
            {
                $notification_data = Chat_request::select('id', 'from_user_id', 'to_user_id', 'status', 'delete_chat_from', 'delete_chat_to')
                                        ->where('status', '!=', 'Approve')
                                        ->where(function($query) use ($data){
                                            $query->where('from_user_id', $data->user_id)->orWhere('to_user_id', $data->user_id);
                                        })->orderBy('id', 'ASC')->get();

                /*
                SELECT id, from_user_id, to_user_id, status FROM chat_requests
                WHERE status != 'Approve'
                AND (from_user_id = $data->user_id OR to_user_id = $data->user_id)
                ORDER BY id ASC
                */

                $sub_data = array();

                foreach($notification_data as $row)
                {
                    $user_id = '';
                    // $chat_delete_id = '';
                    $notification_type = '';

                    if($row->from_user_id == $data->user_id)
                    {
                        $user_id = $row->to_user_id;

                        $notification_type = 'Send Request';
                        $chat_delete_id = $row->id;
                    }
                    else
                    {
                        $user_id = $row->from_user_id;
                        $chat_delete_id = $row->id;
                        $notification_type = 'Receive Request';
                    }

                    $user_data = User::select('id', 'name', 'profile_photo_path')->where('id', $user_id)->first();

                    $sub_data[] = array(
                        'id'            =>  $row->id,
                        'from_user_id'  =>  $row->from_user_id,
                        'to_user_id'    =>  $row->to_user_id,
                        'name'          =>  $user_data->name,
                        'notification_type' =>  $notification_type,
                        'status'           =>   $row->status,
                        'user_image'    =>  $user_data->profile_photo_path,
                        'chat_delete_id' =>  $row->id,
                        'delete_chat_from' => $row->delete_chat_from,
                        'delete_chat_to' =>$row->delete_chat_to,
                        'user_id'=> $data->user_id

                    );
                }

                $sender_connection_id = User::select('connection_id')->where('id', $data->user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['response_load_notification'] = true;

                        $send_data['data'] = $sub_data;

                        $client->send(json_encode($send_data));
                    }
                }
            }

            if($data->type == 'delete_chat_request'){

                $chat_request_id = $data->chat_request_id;

                // Chat_request::where('id', $data->chat_request_id)->delete();
                $chat_request_delete = Chat_request::find($chat_request_id);

                if(chat_request_delete){
                    $usuario_conectado = $data->usuario_conectado;
                    $from_user_id = $data->from_user_id;
                    $to_user_id = $data->to_user_id;

                    if ($usuario_conectado === $from_user_id) {
                        $chat_request_delete->delete_chat_from = $usuario_conectado;
                    } elseif ($usuario_conectado === $to_user_id) {
                        $chat_request_delete->delete_chat_to = $usuario_conectado;
                    }
                    $chat_request_delete->save();
                    //si los dos han borrado el chat lo eliminamos todo de la base de datos
                    if($chat_request_delete->delete_chat_from != 0 && $chat_delete->delete_chat_to != 0){
                        Chat_request::where('id', $chat_request_delete->id)->delete();
                    }
                }else{
                   // Manejo si el chat no se encuentra
                    // Puedes retornar un mensaje de error o realizar otras acciones según tu lógica de aplicación
                }
                $senderConnectionId = User::select('connection_id')
                ->where('id', $data->from_user_id)
                ->first();

                $receiverConnectionId = User::select('connection_id')
                ->where('id', $data->to_user_id)
                ->first();

                // Preparar datos a enviar a los clientes conectados
                $sendData['response_process_chat_request'] = true;
                foreach ($this->clients as $client) {
                    if ($client->resourceId == $senderConnectionId->connection_id) {
                        $sendData['user_id'] = $data->from_user_id;
                        // $sendData['chat_delete_id'] = $data->chat_id;
                    }

                    if ($client->resourceId == $receiverConnectionId->connection_id) {
                        $sendData['user_id'] = $data->to_user_id;
                        // $sendData['chat_delete_id'] = $data->chat_id;
                    }

                    // Enviar datos a los clientes
                    $client->send(json_encode($sendData));
                }
            }

            if($data->type == 'request_process_chat_request')
            {
                Chat_request::where('id', $data->chat_request_id)->update(['status' => $data->action]);

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                $receiver_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get();

                foreach($this->clients as $client)
                {
                    $send_data['response_process_chat_request'] = true;

                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['user_id'] = $data->from_user_id;
                    }

                    if($client->resourceId == $receiver_connection_id[0]->connection_id)
                    {
                        $send_data['user_id'] = $data->to_user_id;
                    }
                    //chat_request_id
                    $client->send(json_encode($send_data));
                }
            }

            if($data->type == 'request_connected_chat_user')
            {
                $condition_1 = ['from_user_id' => $data->from_user_id, 'to_user_id' => $data->from_user_id,];

                $user_id_data = Chat_request::select('from_user_id', 'to_user_id', 'id')
                                            ->orWhere($condition_1)
                                            ->where('status', 'Approve')
                                            ->where(function ($query) use ($data) {
                                                $query->where(function ($query) use ($data) {
                                                    $query->where('delete_chat_from', '!=', $data->from_user_id)
                                                          ->where('delete_chat_to', '!=', $data->from_user_id);
                                                });
                                            })
                                            ->get();

                /*
                SELECT from_user id, to_user_id FROM chat_requests
                WHERE (from_user_id = $data->from_user_id OR to_user_id = $data->from_user_id)
                AND status = 'Approve'
                */

                $sub_data = array();

                foreach($user_id_data as $user_id_row)
                {
                    $user_id = '';
                    $chat_delete_id = '';

                    if($user_id_row->from_user_id != $data->from_user_id)
                    {
                        $user_id = $user_id_row->from_user_id;
                        $chat_delete_id = $user_id_row->id;
                    }
                    else
                    {
                        $chat_delete_id = $user_id_row->id;
                        $user_id = $user_id_row->to_user_id;
                    }

                    $user_data = User::select('id', 'name', 'profile_photo_path', 'user_status', 'updated_at')->where('id', $user_id)->first();

                    if(date('Y-m-d') == date('Y-m-d', strtotime($user_data->updated_at)))
                    {
                        $last_seen = 'Visto por última vez el ' . date('H:i', strtotime($user_data->updated_at));
                    }
                    else
                    {
                        $last_seen = 'Visto por última vez el ' . date('d/m/Y H:i', strtotime($user_data->updated_at));
                    }

                    $sub_data[] = array(
                        'id'    =>  $user_data->id,
                        'name'  =>  $user_data->name,
                        'user_image'    =>  $user_data->profile_photo_path,
                        'user_status'   =>  $user_data->user_status,
                        'last_seen'     =>  $last_seen,
                        'chat_delete_id' => $user_id_row->id,
                        'delete_id_from' => $user_id_row->from_user_id,
                        'delete_id_to' =>   $user_id_row->to_user_id
                    );

                }

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['response_connected_chat_user'] = true;

                        $send_data['data'] = $sub_data;

                        $client->send(json_encode($send_data));
                    }
                }
            }

            if($data->type == 'request_send_message')
            {


                $chat = new Chat;

                $chat->from_user_id = $data->from_user_id;

                $chat->to_user_id = $data->to_user_id;

                $chat->chat_message = $data->message;
                $chat->id_chat = $data->chat_delete_id2;
                $chat->message_status = 'Not Send';


                $chat->save();

                $chat_message_id = $chat->id;

                $receiver_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get();

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $receiver_connection_id[0]->connection_id || $client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['chat_message_id'] = $chat_message_id;

                        $send_data['message'] = $data->message;

                        $send_data['from_user_id'] = $data->from_user_id;

                        $send_data['to_user_id'] = $data->to_user_id;

                        if($client->resourceId == $receiver_connection_id[0]->connection_id)
                        {
                            Chat::where('id', $chat_message_id)->update(['message_status' =>'Send']);

                            $send_data['message_status'] = 'Send';
                        }
                        else
                        {
                            $send_data['message_status'] = 'Not Send';
                        }

                        $client->send(json_encode($send_data));
                    }
                }
                //save chat message in mysql
                $chat_request88 = Chat_request::find($data->chat_delete_id2);
                if($chat_request88->delete_chat_from !== 0 || $chat_request88->delete_chat_to !== 0){
                    $chat_request88->delete_chat_from = 0;
                    $chat_request88->delete_chat_to = 0;
                    $chat_request88->save();

                    $senderConnectionId = User::select('connection_id')
                    ->where('id', $data->from_user_id)
                    ->first();

                    $receiverConnectionId = User::select('connection_id')
                                        ->where('id', $data->to_user_id)
                                        ->first();

                    // Preparar datos a enviar a los clientes conectados
                    $sendData['response_process_chat_request'] = true;

                    foreach ($this->clients as $client) {
                    if ($client->resourceId == $senderConnectionId->connection_id) {
                    $sendData['user_id'] = $data->from_user_id;
                    $sendData['chat_delete_id'] = $data->chat_delete_id2;
                    }

                    if ($client->resourceId == $receiverConnectionId->connection_id) {
                    $sendData['user_id'] = $data->to_user_id;
                    $sendData['chat_delete_id'] = $data->chat_delete_id2;
                    }

                    // Enviar datos a los clientes
                    $client->send(json_encode($sendData));
                    }
                }

            }

            if($data->type == 'request_chat_history')
            {
                $chat_data = Chat::select('id', 'from_user_id', 'to_user_id', 'chat_message', 'message_status')
                                    ->where(function($query) use ($data){
                                        $query->where('from_user_id', $data->from_user_id)->where('to_user_id', $data->to_user_id);
                                    })
                                    ->orWhere(function($query) use ($data){
                                        $query->where('from_user_id', $data->to_user_id)->where('to_user_id', $data->from_user_id);
                                    })->orderBy('id', 'ASC')->get();
                /*
                SELECT id, from_user_id, to_user_id, chat_message, message status
                FROM chats
                WHERE (from_user_id = $data->from_user_id AND to_user_id = $data->to_user_id)
                OR (from_user_id = $data->to_user_id AND to_user_id = $data->from_user_id)
                ORDER BY id ASC
                */

                $send_data['chat_history'] = $chat_data;

                $receiver_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $receiver_connection_id[0]->connection_id)
                    {
                        $client->send(json_encode($send_data));
                    }
                }

            }

            if($data->type == 'update_chat_status')
            {
                //update chat status

                Chat::where('id', $data->chat_message_id)->update(['message_status' => $data->chat_message_status]);

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();

                foreach($this->clients as $client)
                {
                    if($client->resourceId == $sender_connection_id[0]->connection_id)
                    {
                        $send_data['update_message_status'] = $data->chat_message_status;

                        $send_data['chat_message_id'] = $data->chat_message_id;

                        $client->send(json_encode($send_data));
                    }
                }
            }

            if($data->type == 'check_unread_message')
            {
                $chat_data = Chat::select('id', 'from_user_id', 'to_user_id')->where('message_status', '!=', 'Read')->where('from_user_id', $data->to_user_id)->get();

                /*
                SELECT id, from_user_id, to_user_id FROM chats
                WHERE message_status != 'Read'
                AND from_user_id = $data->to_user_id
                */

                $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get(); //send number of unread message

                $receiver_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get(); //send message read status

                foreach($chat_data as $row)
                {
                    Chat::where('id', $row->id)->update(['message_status' => 'Send']);

                    foreach($this->clients as $client)
                    {
                        if($client->resourceId == $sender_connection_id[0]->connection_id)
                        {
                            $send_data['count_unread_message'] = 1;

                            $send_data['chat_message_id'] = $row->id;

                            $send_data['from_user_id'] = $row->from_user_id;
                        }

                        if($client->resourceId == $receiver_connection_id[0]->connection_id)
                        {
                            $send_data['update_message_status'] = 'Send';

                            $send_data['chat_message_id'] = $row->id;

                            $send_data['unread_msg'] = 1;

                            $send_data['from_user_id'] = $row->from_user_id;
                        }

                        $client->send(json_encode($send_data));
                    }
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);

        if(isset($queryarray['token']))
        {
            User::where('token', $queryarray['token'])->update([ 'connection_id' => 0, 'user_status' => 'Offline' ]);

            $user_id = User::select('id', 'updated_at')->where('token', $queryarray['token'])->get();

            $data['id'] = $user_id[0]->id;

            $data['status'] = 'Offline';

            $updated_at = $user_id[0]->updated_at;

            if(date('Y-m-d') == date('Y-m-d', strtotime($updated_at))) //Same Date, so display only Time
            {
                $data['last_seen'] = 'Visto por última vez el ' . date('H:i');
            }
            else
            {
                $data['last_seen'] = 'Visto por última vez el ' . date('d/m/Y H:i');
            }

            foreach($this->clients as $client)
            {
                if($client->resourceId != $conn->resourceId)
                {
                    $client->send(json_encode($data));
                }
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";

        $conn->close();
    }
}

