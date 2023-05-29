@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" placeholder="Informe o nome" class="form-control" value="{{$user->name ?? old('name')}}">
</div>

    <div class="form-group">
        <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Informe o e-mail" class="form-control" value="{{$user->email ?? old('email')}}">
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
            <input type="password" name="password" placeholder="Informe a senha" class="form-control">
    </div>


