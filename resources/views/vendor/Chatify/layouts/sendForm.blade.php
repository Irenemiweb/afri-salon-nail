<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Escribe tu mensaje.."></textarea>
        <button disabled='disabled' class="send-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" display="flex"><path fill="#fff" fill-rule="evenodd" d="M12.151 19.24l-.028.062-.023.064a.576.576 0 0 1-.497.378c-.158 0-.275-.058-.347-.156l-1.294-6.687-.054-.281 6.352-6.353a.815.815 0 1 0-1.153-1.152l-6.484 6.484-6.828-1.474a.392.392 0 0 1-.164-.354.576.576 0 0 1 .378-.496l.054-.02.051-.022 17.292-7.584a.507.507 0 0 1 .136-.019.4.4 0 0 1 .287.113.424.424 0 0 1 .095.415L12.151 19.24zM18.821.126L1.46 7.74A2.204 2.204 0 0 0 .003 9.69a2.015 2.015 0 0 0 1.262 1.988L8.36 13.21l1.336 6.9a2.013 2.013 0 0 0 1.987 1.262 2.204 2.204 0 0 0 1.951-1.457l7.81-17.164A2.062 2.062 0 0 0 20.982.59a2.029 2.029 0 0 0-1.44-.59c-.24 0-.484.041-.721.126z"></path></svg>
        </button>
    </form>
</div>
