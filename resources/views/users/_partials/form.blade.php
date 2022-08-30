@csrf
    <input type="text" name="name" id="" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
    <input type="email" name="email" id="" placeholder="E-mail:" value="{{ $user->email ?? old('email')  }}">
    <input type="password" name="password" id="" placeholder="Senha:">
    <button type="submit">
        Enviar
    </button>
