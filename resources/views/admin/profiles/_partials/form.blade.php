@csrf

@include('sweetalert::alert')

  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">* Nome:</label>
            <input type="text" name="name" placeholder="Informe o nome" class="form-control" value="{{$profile->name ?? old('name')}}">
        </div>
        <div class="form-group col-md-6">
            <label for="descrição">Descrição:</label>
            <input type="text" name="description" placeholder="Informe a descrição" class="form-control" value="{{$profile->description ?? old('description')}}">
        </div>
  </div>
