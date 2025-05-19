{{-- iconos chat --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

@php
use LaravelGravatar\Facades\Gravatar;
@endphp
<style>
/*icono swetalert*/
div:where(.swal2-icon) {
    border-color: transparent!important
}
    .buton-request{
        height: 26px;
        width: 26px;
    }
    .delete-icon{
        cursor: pointer;
    }
html,
body {
    margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
}

.text-gualazon{
    /* color: #e9ffb4; */
    color: #18F0B8;
}
#chat_area
{
    /* background-color: #ece5dd; */
    /* height: calc(100vh - 156px); */
    /* min-height: 500px; */
    /*overflow-y: scroll*/;
}
.verde{
    background-color: #015354;
}
.verdeEnviar:hover{
    background-color: #e9ffb4;
}
.verdeEnviar:hover i{
    filter: invert(1);
}
.message22{
    border-radius: 20px;
    padding: 0.5rem 1rem 0.5rem 1.5rem;
    border: 1px solid #ECEFF1;
}
.message33{
    background-color: #eceff1;
    border-radius: 20px;
    padding: 0.5rem 1rem 0.5rem 1.5rem;
}
.min-height{
    min-height: 7vh;
}
#chat_history
{
    height: calc(100vh - 15.4rem);
    /* min-height: 500px;
    max-height: 500px; */
    overflow-y: scroll!important;
    /* margin-bottom:16px; */
    /* background-color: #ece5dd; */
    padding: 2rem;
}

#user_list
{
    height: calc(100vh - 156px);
    /* min-height: 500px;
    max-height: 500px; */
    overflow-y: scroll;
}
.all-height3{
    height: calc(100vh - 379px)!important;
}
.all-height{
    height: calc(100vh - 112px);
}
.all-height2{
    height: calc(100vh - 239px);
}
.inputMessage{
    border-bottom: 1px solid transparent;
    border: 0.5px solid #80808040;
    border-radius: 10px;
    padding-left: 2rem;
    /* display: flex; */
    align-items: center;
    /* height: 40px; */
}
.card-not-shadow{
    box-shadow: 0 0px 0px #00000094!important;
    border: 0.5px solid #00000012!important;
}
.inputScribe{
    height: 3rem!important;
    border-bottom: 1px solid transparent;

}
.treinta{
    width: 37px;
    height: 35px;
}
/*textarea*/
textarea.ip-msg:focus {
    outline: none; /* Elimina el borde predeterminado del enfoque */
    border-color: #007bff; /* Cambia el color del borde izquierdo, superior e inferior */
    border-right: 3px solid #007bff; /* Añade un borde derecho más grueso */
}
/*boton enviar*/
div.msg-box
{
  /* position: absolute; */
  width: 100%;
  bottom: 0;
  left: 0;
  border-top: 1px solid rgba(60,51,176,0.1);
  overflow: hidden;
}

div.msg-box .ip-msg
{
  width: 85%;
  font-size: 14px;
  padding: 15px;
  padding-right: 0px;
  /* color: rgba(60,51,176,0.9); */
  border: none;
  background: rgba(0,0,0,0.03);
  height: 100%;
}

div.msg-box .ip-msg::placeholder
{
  color: rgba(60,51,176,0.4);
}

div.msg-box span.btn-group
{
  position: absolute;
  right: 0;
  top: 0;
  /* margin-top: 14px; */
  /* display: inline-block; */
  /* margin-right: 10px; */
  text-align: center;
  width: 15%;
  height: 100%;
  justify-content: center;
  display: flex;
  align-items: center;
}

div.msg-box span.btn-group i
{
  color: rgba(60,51,176,1);
  font-size: 28px;
  padding: 7px;
}
</style>
<div class="row" style="height: 100%;padding-right: calc(var(--bs-gutter-x) * 0.5);padding-left: calc(var(--bs-gutter-x) * 0.5);">
    <div class="col-sm-4 col-lg-3 p-0 " style="height: 100%">
        <div class="card card-not-shadow rounded-0" style="height: 100%;">
            <div class="card-header min-height"><b>Chats</b></div>
            <div class="card-body" id="user_list" style="overflow-y: auto;">

            </div>
        </div>
    </div>
    <div class="col-sm-4 col-lg-6 p-0 ">
        <div class="card card-not-shadow rounded-0 " style="height: 100%;">
            <div class="card-header min-height">
                <div class="row">
                    <div class="col col-md-9" id="chat_header"><b>Chat Area</b></div>
                    <div class="col col-md-3" id="chat_options_area"></div>
                    {{-- <div class="col col-md-3" id="delete_chat_area"></div>
                    <div class="col col-md-3" id="close_chat_area"></div> --}}
                </div>
            </div>
            <div class="d-flex align-items-center" id="chat_area" style="height: 100%">
                <div class="init w-100  text-center ">
                    <h5>{{ __('Select a chat on the left to get started.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-lg-3 p-0 ">
        <div class="card card-not-shadow rounded-0" style="overflow-y: hidden; height: 30%;">
            {{-- <div class="card-header">
                <input type="text" class="form-control" placeholder="Search User..." autocomplete="off" id="search_people" onkeyup="search_user('{{ Auth::id() }}', 'this.value');" />
            </div> --}}
            <div class="card-header min-height">
               Usuarios
            </div>
            <div class="card-body" style=" overflow-y:auto">
                <div id="search_people_area" class="mt-3"></div>
            </div>
        </div>
        <div class="card card-not-shadow rounded-0" style="overflow-y: hidden; height:70%">
            <div class="card-header min-height"><b>{{ __('Notification') }}</b></div>
            <div class="card-body"  style=" overflow-y:auto">
                <ul class="list-group" id="notification_area">

                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    // if (!localStorage.getItem('reloaded')) {
    // localStorage.setItem('reloaded', 'true');
    // location.reload();
    // } else {
    //     localStorage.removeItem('reloaded');
    // }
    @auth
    // var conn = new WebSocket('ws://127.0.0.1:8090/?token={{ auth()->user()->token }}');
    var authenticatedUserId = "{{ Auth::user()->id }}";
    var from_user_id = "{{ Auth::user()->id }}";
    var authUserImageProfile = "{{ Auth::user()->profile_photo_url }}";
    // console.log(from_user_id,'id usuario');
    var usuario_conectado = parseInt("{{ Auth::user()->id }}");
    var autenticado = "{{ Auth::check() ? 'true' : 'false' }}";
    var chat_delete_id = "";
    var to_user_id = "";
    var email = "";
    var gravatarURL= "";
    var name = "";

    conn.onopen = function(e){

        console.log("Connection established!");

        load_unconnected_user(from_user_id);

        load_unread_notification(from_user_id);

        load_connected_chat_user(from_user_id);

    };

    conn.onmessage = function(e){

        var data = JSON.parse(e.data);

        // console.log(data.status, 'DATA');
        // console.log(autenticado, 'conectado');
        var chatExteriorDiv2 = document.querySelector('.red-circle2');


        if(data.status)
        {

            var online_status_icon = document.getElementsByClassName('online_status_icon');

            for(var count = 0; count < online_status_icon.length; count++)
            {
                if(online_status_icon[count].id == 'status_'+data.id)
                {
                    if(data.status == 'Online')
                    {
                        online_status_icon[count].classList.add('text-success');

                        online_status_icon[count].classList.remove('text-danger');

                        document.getElementById('last_seen_'+data.id+'').innerHTML = 'Online';
                    }
                    else
                    {
                        online_status_icon[count].classList.add('text-danger');

                        online_status_icon[count].classList.remove('text-success');

                        document.getElementById('last_seen_'+data.id+'').innerHTML = data.last_seen;
                    }
                }
            }
        }

        if(data.response_load_unconnected_user || data.response_search_user)
        {
            var html = '';

            if(data.data.length > 0)
            {
                html += '<ul class="list-group">';

                for(var count = 0; count < data.data.length; count++)
                {

                    var user_image = '';
                    name = data.data[count].name;
                    gravatarURL = `https://ui-avatars.com/api/?name=${name}&color=7F9CF5&background=EBF4FF`;//`https://ui-avatars.com/api/?name=${name}`;
                    var user_image =
                        (data.data[count].user_image === null || data.data[count].user_image === '')
                        ? `<img src="${gravatarURL}" width="50" height="50" class="rounded-circle" />`
                        : `<img src="{{ asset('storage') }}/${data.data[count].user_image}" width="40" height="40" class="rounded-circle" />`;

                    html += `
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col col-9">`+user_image+`&nbsp;`+data.data[count].name+`</div>
                            <div class="col col-3">
                                <button style="backgroun-color:transparent;border:none" type="button" name="send_request" class="btn btn-sm float-end" onclick="send_request(this, `
                                +from_user_id+`, `+data.data[count].id+`)"><i style="color: #cfd8dc;font-size: 1.7rem;" class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    `;
                }

                html += '</ul>';
            }
            else
            {
                html = '{{ __("You not have any chat") }}';

            }

            document.getElementById('search_people_area').innerHTML = html;
        }

        if(data.response_from_user_chat_request)
        {
            // search_user(from_user_id, document.getElementById('search_people').value);

            load_unread_notification(from_user_id);
        }

        if(data.response_to_user_chat_request)
        {
            load_unread_notification(data.user_id);
        }

        if(data.response_load_notification)
        {
            var html = '';

            for(var count = 0; count < data.data.length; count++)
            {
                var user_image = '';

                    // email = data.data[count].email;
                    // gravatarURL = `https://www.gravatar.com/avatar/${email}?s=40&d=identicon&r=g`;
                    name = data.data[count].name;
                    gravatarURL = `https://ui-avatars.com/api/?name=${name}&color=7F9CF5&background=EBF4FF`;//`https://ui-avatars.com/api/?name=${name}`;
                    var user_image =
                        (data.data[count].user_image === null || data.data[count].user_image === '')
                        ? `<img src="${gravatarURL}" width="40"  height="40" class="rounded-circle" />`
                        : `<img src="{{ asset('storage/') }}/${data.data[count].user_image}" width="40" height="40" class="rounded-circle" />`;
                        // `<img class="rounded-circle" width="50" height="50" src="`+ authUserImageProfile+`" alt="{{ Auth::user()->name }}" />`;

                html += `
                <li class="list-group-item">
                    <div class="row">
                        <div class="col col-8">`+user_image+`&nbsp;`+data.data[count].name+data.data[count].chat_delete_id+`</div>
                        <div class="col col-4 justify-content-center d-flex">
                `;
                if(data.data[count].notification_type == 'Send Request')
                {
                    if(data.data[count].status == 'Pending')
                    {
                        // html += '<button type="button" name="send_request" class="btn btn-warning btn-sm float-end">Petición enviada</button>';
                        html += `
                            <img style="cursor: pointer;" src="{{ asset('storage/icons-chat-gualazon/rechaEnvi.svg') }}" width="30" class=""  onclick="delete_chat(` + data.data[count].id + `, ` + data.data[count].from_user_id + `, ` + data.data[count].to_user_id +`,'null', 'true')"/>
                            `;
                    }
                    else
                    {

                        if ((data.data[count].delete_chat_to.toString() === data.data[count].user_id) || (data.data[count].delete_chat_from.toString() === data.data[count].user_id)) {
                            html = '';
                        } else {

                            html += `
                            <img style="cursor: pointer;" src="{{ asset('storage/icons-chat-gualazon/rechaEnvi.svg') }}" width="30" class=""  onclick="delete_chat(` + data.data[count].id + `, ` + data.data[count].from_user_id + `, ` + data.data[count].to_user_id + `, 'true', 'null')"/>
                            `;
                        }


                    }
                }
                else
                {
                    if (data.data[count].status == 'Pending') {
                        html +=`
                            <div class="btn-group float-end">
                                <a type="button" class="justify-content-end d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px;height: 30px;">
                                <svg width="4" height="23" viewBox="0 0 4 23" xmlns="http://www.w3.org/2000/svg" display="flex"><g id="Styleguide" fill="none" fill-rule="evenodd"><g id="MVP" transform="translate(-1357 -147)" fill="#607d8b"><g transform="translate(101 104)" id="Dashboard"><g id="Group-7-Copy-3"><g id="WIreframe-Copy"><path d="M1258 47a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 9.39a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 9.39a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" id="More-Menu"></path></g></g></g></g></g></svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="process_chat_request(`
                                         + data.data[count].id + `, ` + data.data[count].from_user_id + `, `
                                         + data.data[count].to_user_id + `, \`Approve\`)"> Aceptar</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a id="close_chat" class="dropdown-item" href="#" onclick="process_chat_request(`
                                        + data.data[count].id + `, ` + data.data[count].from_user_id + `, `
                                        + data.data[count].to_user_id + `, \`Reject\`)">Rechazar</a></li>
                                </ul>
                                </div>
                            `;
                        // html += '<button type="button" class="btn btn-danger buton-request btn-sm float-end" onclick="process_chat_request(' + data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count].to_user_id + ', \'Reject\')"><i class="fas fa-times"></i></button>&nbsp;';
                        // html += '<button type="button" class="btn btn-success buton-request btn-sm float-end" onclick="process_chat_request(' + data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count].to_user_id + ', \'Approve\')"><i class="fas fa-check"></i></button>';
                    } else {
                        // Verifica si `delete_chat_to` y `delete_chat_from` son distintos de `user_id`
                        if ((data.data[count].delete_chat_to === data.data[count].user_id) || (data.data[count].delete_chat_from === data.data[count].user_id)) {
                            html = 'No tienes peticiones.';
                        } else {
                            html += `
                            <img style="cursor: pointer;" src="{{ asset('storage/icons-chat-gualazon/rechaEnvi.svg') }}" width="30" class=""  onclick="delete_chat(` + data.data[count].id + `, ` + data.data[count].from_user_id + `, ` + data.data[count].to_user_id + `, 'true', 'null')"/>
                            `;
                            // html += '<p>aut' + authenticatedUserId  + '</p>';
                            // html += '<p>to' + data.data[count].delete_chat_to + '</p>';
                            // html += '<p>from' + data.data[count].delete_chat_from + '</p>';
                            // html += '<p>usi' + data.data[count].user_id + '</p>';
                            // html += '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Petición rechazada</button>';
                            // html += '<button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Eliminar chat" type="button" id="" class="btn btn-secondary treinta btn-sm" onclick="delete_chat(' + data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count].to_user_id + ')"><i style="font-size: 25px; font-weight: 100;" class="fas fa-trash-alt"></i></button>';
                            // html += '<p>Son distintos</p>';
                        }
                    }
                }

                html += `
                        </div>
                    </div>
                </li>
                `;
            }

            document.getElementById('notification_area').innerHTML = html;
        }

        if(data.response_process_chat_request)
        {
            load_unread_notification(data.user_id);

            load_connected_chat_user(data.user_id);
        }

        if(data.response_connected_chat_user)
        {
            var html = '<div class="list-group">';

            if(data.data.length > 0)
            {
                for(var count = 0; count < data.data.length; count++)
                {
                    html += `
                    <a href="#" class="list-group-item d-flex justify-content-between align-items-start" onclick="make_chat_area(`
                    +data.data[count].id+`, '`+data.data[count].name+`', `+data.data[count].chat_delete_id+`, `
                    +data.data[count].delete_id_from+`, `+data.data[count].delete_id_to+`,'`+data.data[count].user_image+`'); load_chat_data(`+from_user_id+`, `+data.data[count].id+`); ">
                        <div class="ms-2 me-auto">`+data.data[count].chat_delete_id+`
                    `;

                    var last_seen = '';

                    if(data.data[count].user_status == 'Online')
                    {
                        html += '<span class="text-success online_status_icon" id="status_'+data.data[count].id+'"><i class="fas fa-circle"></i></span>';

                        last_seen = 'Online';
                    }
                    else
                    {
                        html += '<span class="text-danger online_status_icon" id="status_'+data.data[count].id+'"><i class="fas fa-circle"></i></span>';

                        last_seen = data.data[count].last_seen;
                    }

                    var user_image = '';
                    name = data.data[count].name;
                    gravatarURL = `https://ui-avatars.com/api/?name=${name}&color=7F9CF5&background=EBF4FF`;
                    // aqui
                    // email = data.data[count].email;
                    // gravatarURL = `https://www.gravatar.com/avatar/${email}?s=40&d=identicon&r=g`;
                    // console.log(data.data[count].chat_delete_id, "chat_delete");
                    var user_image =
                        (data.data[count].user_image === null || data.data[count].user_image === '')
                        ? `<img src="${gravatarURL}" width="40"  height="40" class="rounded-circle" />`
                        : `<img src="{{ asset('storage/') }}/${data.data[count].user_image}" width="40" height="40" class="rounded-circle" />`;




                    html += `
                    &nbsp; `+user_image+`&nbsp;<b>`+data.data[count].name+`</b>
                            <div class="text-right"><small class="text-muted last_seen" id="last_seen_`+data.data[count].id+`">`+last_seen+`</small></div>
                        </div>
                        <span class="user_unread_message" data-id="`+data.data[count].id+`" id="user_unread_message_`+data.data[count].id+`"></span>
                    </a>
                    `;
                }
            }
            else
            {
                html = '{{ __("You not have any chat") }}';

            }

            html += '</div>';

            document.getElementById('user_list').innerHTML = html;

            check_unread_message();
        }

        if(data.message)
        {
            var html = '';

            if(data.from_user_id == from_user_id)
            {

                var icon_style = '';

                if(data.message_status == 'Not Send')
                {
                    icon_style = '<span id="chat_status_'+data.chat_message_id+'" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                }
                if(data.message_status == 'Send')
                {
                    icon_style = '<span id="chat_status_'+data.chat_message_id+'" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                }

                if(data.message_status == 'Read')
                {
                    icon_style = '<span class="text-gualazon float-end" id="chat_status_'+data.chat_message_id+'"><i class="fas fa-check-double"></i></span>';
                }

                html += `
                <div class="row">
                    <div class="col col-6">&nbsp;</div>
                    <div class="col col-6 alert message33 text-dark shadow-sm">
                        `+data.message+ icon_style +`
                    </div>
                </div>
                `;
            }
            else
            {
                if(to_user_id != '')
                {
                    html += `
                    <div class="row">
                        <div class="col col-6 alert message22 text-dark shadow-sm">
                        `+data.message+`
                        </div>
                    </div>
                    `;
                    var chatExteriorDiv = document.querySelector('.red-circle');
                    if(chatExteriorDiv){
                        chatExteriorDiv.classList.add('d-none');
                    }

                        var chatExteriorDiv2 = document.querySelector('.red-circle2');
                        chatExteriorDiv2.classList.add('d-none');
                    update_message_status(data.chat_message_id, data.from_user_id, to_user_id, 'Read');
                }
                else
                {
                    var count_unread_message_element = document.getElementById('user_unread_message_'+data.from_user_id+'');
                    if(count_unread_message_element)
                    {
                        var count_unread_message = count_unread_message_element.textContent;
                        if(count_unread_message == '')
                        {
                            count_unread_message = parseInt(0) + 1;
                        }
                        else
                        {
                            count_unread_message = parseInt(count_unread_message) + 1;
                        }
                        count_unread_message_element.innerHTML = '<span class="badge bg-primary rounded-pill">'+count_unread_message+'</span>';

                        var chatExteriorDiv = document.querySelector('.red-circle');
                        if(chatExteriorDiv){
                            chatExteriorDiv.classList.remove('d-none');
                        }

                        var chatExteriorDiv2 = document.querySelector('.red-circle2');
                        chatExteriorDiv2.classList.remove('d-none');
                        update_message_status(data.chat_message_id, data.from_user_id, data.to_user_id, 'Send');
                    }
                }

            }

            if(html != '')
            {
                var previous_chat_element = document.querySelector('#chat_history');

                var chat_history_element = document.querySelector('#chat_history');

                chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
                scroll_top();
            }

        }

        if(data.chat_history)
        {
            var html = '';

            for(var count = 0; count < data.chat_history.length; count++)
            {
                if(data.chat_history[count].from_user_id == from_user_id)
                {
                    var icon_style = '';

                    if(data.chat_history[count].message_status == 'Not Send')
                    {
                        icon_style = '<span id="chat_status_'+data.chat_history[count].id+'" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                    }

                    if(data.chat_history[count].message_status == 'Send')
                    {
                        icon_style = '<span id="chat_status_'+data.chat_history[count].id+'" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                    }

                    if(data.chat_history[count].message_status == 'Read')
                    {
                        icon_style = '<span class="text-gualazon float-end" id="chat_status_'+data.chat_history[count].id+'"><i class="fas fa-check-double"></i></span>';
                    }

                    html +=`
                    <div class="row">
                        <div class="col col-6">&nbsp;</div>
                        <div class="col col-6 alert message33 text-dark shadow-sm">
                        `+data.chat_history[count].chat_message+ icon_style + `
                        </div>
                    </div>
                    `;

                }
                else
                {
                    if(data.chat_history[count].message_status != 'Read')
                    {
                        update_message_status(data.chat_history[count].id, data.chat_history[count].from_user_id, data.chat_history[count].to_user_id, 'Read');
                    }

                    html += `
                    <div class="row">
                        <div class="col col-6 alert message22 text-dark shadow-sm">
                        `+data.chat_history[count].chat_message+`
                        </div>
                    </div>
                    `;

                    var count_unread_message_element = document.getElementById('user_unread_message_'+data.chat_history[count].from_user_id+'');

                    if(count_unread_message_element)
                    {
                        count_unread_message_element.innerHTML = '';
                    }
                }
            }

            document.querySelector('#chat_history').innerHTML = html;

            scroll_top();
        }

        if(data.update_message_status)
        {

            var chat_status_element = document.querySelector('#chat_status_'+data.chat_message_id+'');
            // console.log(chat_status_element,'chat status element');

            if(chat_status_element)
            {
                if(data.update_message_status == 'Read')
                {
                    chat_status_element.innerHTML = '<i class="fas fa-check-double text-gualazon"></i>';

                }
                if(data.update_message_status == 'Send')
                {
                    chat_status_element.innerHTML = '<i class="fas fa-check-double text-muted"></i>';
                }
            }
            if(data.unread_msg)
            {
                var count_unread_message_element = document.getElementById('user_unread_message_'+data.from_user_id+'');

                if(count_unread_message_element)
                {
                    var count_unread_message = count_unread_message_element.textContent;

                    if(count_unread_message == '')
                    {
                        count_unread_message = parseInt(0) + 1;
                    }
                    else
                    {
                        count_unread_message = parseInt(count_unread_message) + 1;
                    }

                    count_unread_message_element.innerHTML = '<span class="badge bg-danger rounded-pill">'+count_unread_message+'</span>';
                    var chatExteriorDiv = document.querySelector('.red-circle');
                    if(chatExteriorDiv){
                        chatExteriorDiv.classList.remove('d-none');
                    }

                    var chatExteriorDiv2 = document.querySelector('.red-circle2');
                    chatExteriorDiv2.classList.remove('d-none');
                }
            }
        }
    };

    function scroll_top()
    {
        document.querySelector('#chat_history').scrollTop = document.querySelector('#chat_history').scrollHeight;
    }

    function load_unconnected_user(from_user_id)
    {
        var data = {
            from_user_id : from_user_id,
            type : 'request_load_unconnected_user'
        };

        conn.send(JSON.stringify(data));
    }

    function search_user(from_user_id, search_query)
    {
        if(search_query.length > 0)
        {
            var data = {
                from_user_id : from_user_id,
                search_query : search_query,
                type : 'request_search_user'
            };

            conn.send(JSON.stringify(data));
        }
        else
        {
            load_unconnected_user(from_user_id);
        }
    }

    function send_request(element, from_user_id, to_user_id)
    {
        var data = {
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            type : 'request_chat_user'
        };

        element.disabled = true;

        conn.send(JSON.stringify(data));
    }
    function delete_chat(chat_id, from_user_id, to_user_id, rejected, send){
        console.log(rejected, send, "rejected y send");
        var title='';
        var text='';
        if(rejected === 'null' && send === 'null'){//eliminar chat
            console.log("eliminar chat");
            title = 'Eliminar chat';
            text = '¿Desea eliminar este chat? Si aceptas eliminarás el chat definitivamente.';
        }else if(send == 'null' && rejected == 'true'){
            title = 'Eliminar petición de chat';
            text = 'Esta petición de chat ha sido rechazada, ¿quieres eliminarla de tu panel de notificaciones?';
        }else if(send === 'true' && rejected === 'null'){
            title = 'Eliminar petición de chat enviada';
            text = 'Esta petición de chat está en espera de ser aceptada, aunque la elimines de tu panel el destinatario seguirá viéndola en el suyo. ¿Deseas eliminar esta petición de chat de tu panel de notificaciones?';
        }
        console.log(chat_id, "chat id");
        var swal = Swal.mixin({
            customClass:{
                cancelButton: "btn btn-secondary rounded-pill",
                confirmButton: "btn btn-danger rounded-pill"
            },
            buttonsStyling:true
        });

        swal.fire({
            iconHtml: '<img class="" width="150"  src="{{ asset("storage/logo/masco_gualazon_pensativa.svg") }}" />',
            customClass: {
                icon: 'no-border'  // Clase personalizada para asegurar que el ícono predeterminado no interfiera
            },
            title: title,
            text: text,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    close_chat();
            // console.log(from_user_id, to_user_id, usuario_conectado);
                    var data={
                        usuario_conectado : usuario_conectado,
                        from_user_id : from_user_id,
                        to_user_id : to_user_id,
                        chat_id: chat_id,
                        type : 'delete_chat'
                    };
                    conn.send(JSON.stringify(data));
                    swal = Swal.mixin({
                        customClass:{
                            confirmButton: "btn btn-success rounded-pill"
                        },
                        buttonsStyling:true
                    });
                    swal.fire({
                        confirmButtonColor: '#d33',
                        title: "Eliminado!",
                        text: "El chat se ha eliminado correctamente.",
                        icon: "success"
                });

                }
            });
    }

    function load_unread_notification(user_id)
    {
        var data = {
            user_id : user_id,
            type : 'request_load_unread_notification'
        };

        conn.send(JSON.stringify(data));

    }

    function process_chat_request(chat_request_id, from_user_id, to_user_id, action)
    {
        // console.log(action, chat_request_id);
        var data = {
            chat_request_id : chat_request_id,
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            action : action,
            type : 'request_process_chat_request'
        };

        conn.send(JSON.stringify(data));
    }
    function delete_chat_request(chat_request_id, from_user_id, to_user_id){
        var data = {
            chat_request_id : chat_request_id,
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            usuario_conectado : usuario_conectado,
            type : 'delete_chat_request'
        };

        conn.send(JSON.stringify(data));
    }
    function load_connected_chat_user(from_user_id)
    {
        // console.log(usuario_conectado,'chat-borrar');
        var data = {
            usuario_conectado33 : usuario_conectado,
            from_user_id : from_user_id,
            type : 'request_connected_chat_user'
        };

        conn.send(JSON.stringify(data));
    }

    function make_chat_area(user_id, to_user_name, chat_delete_id, delete_chat_from, delete_chat_to, image_user)
    {
        var user_image = '';

        name = to_user_name;
        gravatarURL = `https://ui-avatars.com/api/?name=${name}&color=7F9CF5&background=EBF4FF`;
        var user_image =
            (image_user === 'null' || image_user === '')
            ? `<img src="${gravatarURL}" width="40"  height="40" class="rounded-circle" />`
            : `<img src="{{ asset('storage/') }}/${image_user}" width="40" height="40" class="rounded-circle" />`;


        var divCard = document.getElementById('chat_area');
            divCard.classList.remove('d-flex');
            divCard.classList.remove('align-items-center');
            var html = `
        <div id="chat_history" style=""></div>
        <div class="input-group">
            <div class="msg-box">
                <textarea id="message_area" class="ip-msg" placeholder="Escribe un mensaje..." onkeypress="handleKeyPress('envioEnterChat',event, `+chat_delete_id+`,`+delete_chat_from+`, `+delete_chat_to+`)"></textarea>
                <span id="send_button" class="btn-group" onclick="send_chat_message(`+chat_delete_id+`,`+delete_chat_from+`, `+delete_chat_to+`)">
                    <i class="fa fa-paper-plane"></i>
                </span>
            </div>
        </div>

        `;



        document.getElementById('chat_area').innerHTML = html;

        document.getElementById('chat_header').innerHTML = ' <b>' + user_image + '</b>'+ to_user_name + '</b>';
        document.getElementById("message_area").focus();
        document.getElementById('chat_options_area').innerHTML = `
        <div class="btn-group float-end">
        <a type="button" class="justify-content-end d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px;height: 30px;">
        <svg width="4" height="23" viewBox="0 0 4 23" xmlns="http://www.w3.org/2000/svg" display="flex"><g id="Styleguide" fill="none" fill-rule="evenodd"><g id="MVP" transform="translate(-1357 -147)" fill="#607d8b"><g transform="translate(101 104)" id="Dashboard"><g id="Group-7-Copy-3"><g id="WIreframe-Copy"><path d="M1258 47a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 9.39a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 9.39a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" id="More-Menu"></path></g></g></g></g></g></svg>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="delete_chat(` + chat_delete_id + `, ` + delete_chat_from + `, ` + delete_chat_to + `, 'null', 'null')">
                Eliminar Chat
                </a>
            </li>
            <li><a id="close_chat" class="dropdown-item" href="#" onclick="close_chat();">Cerrar conversación</a></li>
            <li><a class="dropdown-item" href="#">Denunciar producto</a></li>
            <li><a class="dropdown-item" href="#">Reportar usuario</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a style="color:red;" class="dropdown-item" href="#">Bloquear usuario</a></li>
        </ul>
        </div>
        `;
        // document.getElementById('delete_chat_area').innerHTML = '<button data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Eliminar chat"  type="button" id="" class="btn btn-secondary  treinta btn-sm" onclick="delete_chat(' + chat_delete_id + ', ' + delete_chat_from + ', ' + delete_chat_to + ')"><i style="font-size: 25px;font-weight: 100;" class="fas fa-trash-alt"></i></button>';

        // document.getElementById('delete_chat_area').innerHTML = `
        // <div class="pushable" style="width: 50px;height: 0px;" onclick="delete_chat(${chat_delete_id}, ${delete_chat_from}, ${delete_chat_to})">
        //     <span class="front_btn" style="border-radius: 50%!important;padding:0.5rem!important;margin-top: 1px !important;text-align: center;">
        //         <i style="font-size: 25px;font-weight: 100;" class="fas fa-trash-alt"></i>
        //     </span>
        // </div>
        // `;
        // document.getElementById('close_chat_area').innerHTML =`
        // <button class="item-1 item-buton_close_chat" data-bs-dismiss="modal" type="button" style="justify-content: flex-start;display: flex;">
        //     <span class="inner justify-content-center " style="margin:0px!important">
        //         <span class="label">Cerrar chat</span>
        //         </span>
        // </button>
        // `;
        // document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" treinta class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

        to_user_id = user_id;
        chat_delete_id = chat_delete_id;

    }

    function close_chat()
    {
        document.getElementById('chat_header').innerHTML = 'Chat Area';

        // document.getElementById('close_chat_area').innerHTML = '';

        // document.getElementById('delete_chat_area').innerHTML = '';
        document.getElementById('chat_area').classList.add('align-items-center');
        document.getElementById('chat_area').classList.add('d-flex');
        document.getElementById('chat_area').innerHTML = `
        <div class="init w-100  text-center ">
            <h5>{{ __('Select a chat on the left to get started.') }}</h5>
        </div>
        `;

        to_user_id = '';
    }
    function handleKeyPress(enter, event,chat_delete_id2, delete_chat_from2, delete_chat_to2) {
        if (event.key === 'Enter' && enter === 'envioEnterChat')
        {
            event.preventDefault();
        // Llamar a la función send_chat_message con el chat_delete_id
        send_chat_message(chat_delete_id2, delete_chat_from2, delete_chat_to2);
        }
    }
    function send_chat_message(chat_delete_id2, delete_chat_from2, delete_chat_to2) {
    // console.log(chat_delete_id2, 'id2');

    // var message = document.getElementById('message_area').innerHTML.trim();
    var message = document.getElementById('message_area').value;

    // Verifica si el mensaje está vacío
    if (message === '') {
        alert('El mensaje no puede estar vacío.');
        return; // Detiene la función si el mensaje está vacío
    }

    // Deshabilita el botón durante el envío
    document.querySelector('#send_button').disabled = true;

    var data = {
        message: message,
        delete_chat_from2: delete_chat_from2,
        delete_chat_to2: delete_chat_to2,
        from_user_id: from_user_id,
        to_user_id: to_user_id,
        chat_delete_id2: chat_delete_id2,
        type: 'request_send_message'
    };

    // Envía el mensaje
    conn.send(JSON.stringify(data));

    // Limpia el área de mensajes después de enviar el mensaje
    // document.querySelector('#message_area').innerHTML = '';
    document.querySelector('#message_area').value = '';

    // Habilita nuevamente el botón después de enviar el mensaje
    document.querySelector('#send_button').disabled = false;
}


    function load_chat_data(from_user_id, to_user_id)
    {
        var data = {
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            type : 'request_chat_history'
        };

        conn.send(JSON.stringify(data));
    }

    function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status)
    {
        var data = {
            chat_message_id : chat_message_id,
            from_user_id : from_user_id,
            to_user_id : to_user_id,
            chat_message_status : chat_message_status,
            type : 'update_chat_status'
        };
        if(chat_message_status === 'Read'){
            var chatExteriorDiv = document.querySelector('.red-circle');
            if(chatExteriorDiv){
                chatExteriorDiv.classList.add('d-none');
            }

            var chatExteriorDiv2 = document.querySelector('.red-circle2');
            chatExteriorDiv2.classList.add('d-none');
        }
        // console.log(data,'METODO');
        conn.send(JSON.stringify(data));
    }

    function check_unread_message()
    {
        var unread_element = document.getElementsByClassName('user_unread_message');

        for(var count = 0; count < unread_element.length; count++)
        {
            var temp_user_id = unread_element[count].dataset.id;
            // console.log(temp_user_id,'la famosa temp');
            var data = {
                from_user_id : from_user_id,
                to_user_id : temp_user_id,
                type : 'check_unread_message'
            };

            conn.send(JSON.stringify(data));
        }
    }

    function upload_image()
    {
        var file_element = document.getElementById('browse_image').files[0];

        var file_name = file_element.name;

        var file_extension = file_name.split('.').pop().toLowerCase();

        var allowed_extension = ['png', 'jpg'];

        if(allowed_extension.indexOf(file_extension) == -1)
        {
            alert("Invalid Image File");

            return false;
        }

        var file_reader = new FileReader();

        var file_raw_data = new ArrayBuffer();

        file_reader.loadend = function()
        {

        }

        file_reader.onload = function(event){

            file_raw_data = event.target.result;

            conn.send(file_raw_data);
        }

        file_reader.readAsArrayBuffer(file_element);
    }
    @endauth
    </script>
