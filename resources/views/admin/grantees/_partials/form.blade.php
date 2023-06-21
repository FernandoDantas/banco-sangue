@csrf

@include('sweetalert::alert')

  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Informe o nome" class="form-control" value="{{$grantee->name ?? old('name')}}">
        </div>
        <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Informe o e-mail" class="form-control" value="{{$grantee->email ?? old('email')}}">
        </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="email">Whatsapp:</label>
        <input type="text" id="whatsapp" placeholder="Whatsapp" class="form-control" name="whatsapp" value="{{$grantee->whatsapp ?? old('whatsapp')}}" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
    </div>
    <div class="form-group col-md-6">
        <label for="email">Idade:</label>
        <input type="number" id="age" placeholder="idade" class="form-control" name="age" value="{{$grantee->age ?? old('age')}}">
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
        <label for="email">Ala/Ramo</label>
        <select id="ala" class="form-control" name="ward" value="{{$grantee->ward ?? old('ward')}}">
        @foreach ($wards as $ward)
        @if(isset($grantee->ward))
            <option @selected($ward->name == $grantee->ward) value="{{$ward->name}}">
                {{$ward->name}}
            </option>
        @else
            <option value="{{$ward->name}}">
                {{$ward->name}}
            </option>
        @endif
        @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="email">Data que precisa receber a doação:</label>
        <input type="date" id="date" class="form-control" name="blood" value="{{$grantee->date ?? old('date')}}">
    </div>

    <div class="form-group col-md-4">
        <label>Qual o tipo sanguíneo?</label>
        <select id="tipo" class="form-control" name="ward" value="{{$grantee->blood ?? old('blood')}}">
            @foreach ($types as $type)
            @if(isset($grantee->blood))
                <option @selected($type->name == $grantee->blood) value="{{$type->name}}">
                    {{$type->name}}
                </option>
            @else
                <option value="{{$type->name}}">
                    {{$type->name}}
                </option>
            @endif
            @endforeach
            </select>
    </div>

    <div class="form-group col-md-4">
        <label for="amount">Quantidade de bolsas:</label>
        <input type="number" id="amount" class="form-control" name="amount" value="{{$grantee->amount ?? old('amount')}}">
    </div>

    <div class="form-group col-md-4">
        <label>Localidade</label>

    </div>

    <div class="form-group col-md-4">
        <label>Prioridade?</label>


    </div>
  </div>



    <script>

        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
             r = r.replace(/^0/, "");
            if (r.length > 10) {
                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
             } else if (r.length > 2) {
                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
             } else {
                    r = r.replace(/^(\d*)/, "($1");
             }
             return r;
        }
     </script>



