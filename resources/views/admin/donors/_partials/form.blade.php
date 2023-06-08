@csrf

@include('sweetalert::alert')

  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Informe o nome" class="form-control" value="{{$donor->name ?? old('name')}}">
        </div>
        <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Informe o e-mail" class="form-control" value="{{$donor->email ?? old('email')}}">
        </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="email">Whatsapp:</label>
        <input type="text" id="whatsapp" placeholder="Whatsapp" class="form-control" name="whatsapp" value="{{$donor->whatsapp ?? old('whatsapp')}}" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
    </div>
    <div class="form-group col-md-6">
        <label for="email">Idade:</label>
        <input type="number" id="age" placeholder="idade" class="form-control" name="age" value="{{$donor->age ?? old('age')}}">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
        <label for="email">Ala/Ramo</label>
        <select id="ala" class="form-control" name="ward" value="{{$donor->ward ?? old('ward')}}">
            <option value="Liberdade">Ala Liberdade</option>
            <option value="Jardin Paulistano">Ala Jardin Paulistano</option>
            <option value="Presidente Médice">Ala Presidente Médice</option>
            <option value="Prata">Ala Prata</option>
            <option value="Bodocongó">Ala Bodocongó</option>
            <option value="Malvinas">Ala Malvinas</option>
            <option value="Sítio Lucas">Ala Sítio Lucas</option>
            <option value="Queimadas">Ala Queimadas</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="email">Data da última doação:</label>
        <input type="date" id="date" class="form-control" name="date" value="{{$donor->date ?? old('date')}}">
    </div>

    <div class="form-group col-md-4">
        <label>Qual o tipo sanguíneo?</label>
        <select id="sangue" class="form-control" name="blood" value="{{$donor->date ?? old('blood')}}">
            <option value="O+">O Positivo</option>
            <option value="O-">O Negativo</option>
            <option value="A+">A Positivo</option>
            <option value="A-">A Negativo</option>
            <option value="B+">B Positivo</option>
            <option value="B-">B Negativo</option>
            <option value="AB+">AB Positivo</option>
            <option value="AB-">AB Negativo</option>
        </select>
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



