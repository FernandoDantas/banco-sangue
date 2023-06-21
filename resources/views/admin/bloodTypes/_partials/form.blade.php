@csrf

@include('sweetalert::alert')

  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Informe o nome" class="form-control" value="{{$bloodType->name ?? old('name')}}">
        </div>
  </div>
