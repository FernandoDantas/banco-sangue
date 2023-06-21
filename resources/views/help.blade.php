<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/fonts.css" rel="stylesheet">
    <link href="../assets/css/media.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" >
    <title>Banco de sangue</title>
</head>
<body>
    <header>
        <div id="title">
            <h1>Banco de</h1>
            <h1>Sangue</h1>
        </div>

        <ul>
            <a href=".."><li>Início</li></a>
            <a href="https://www.instagram.com/hemocentrocg/" target="_blank"><li>Hemocentro</li></a>
            <!--<a href="#"><li>Sobre</li></a>
            <a href="https://api.whatsapp.com/send/?phone=558333445475&text&type=phone_number&app_absent=0" target="_blank"><li>Contato</li></a>-->
            <a href="{{route('grantees.help')}}"><li class="sub-title">Ajude-me</li></a>
            @guest
                <a href="{{route('login.show')}}" id="inscreva-se-btn"><li>Já tem uma conta?</li></a>
            @endguest
            @auth
                <a href="{{route('logout')}}" id="inscreva-se-btn"><li>Sair</li></a>
            @endauth
        </ul>
    </header>

    <main>
        <aside>
            <h2><span>Precisa de sangue?</span></h2>
            <h2>podemos ajudar!</h2>
            <p>
                Faça seu cadastro. <b>Receba ajuda!</b> Temos doadores no nosso banco de sangue que pode lhe ajudar.
            </p>

            @include('sweetalert::alert')

            @if ($errors->any())
            <div class="modal-alert-landing" role="alert">
                <div class="content-modal-landing">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><b>{{$error}}</b></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif


            <form id="formHome" action="{{route('grantees.store')}}" method="post">
                @csrf
                <div class="step">
                    <label>Qual seu nome e e-mail?</label>
                    <input type="text" id="nome" placeholder="Nome" name="name" value="{{old('name')}}">
                    <input type="email" id="email" placeholder="E-mail" name="email" value="{{old('email')}}">
                    <button type="button" class="button-step" onclick="nextStep(1)">Próximo <i class="fa fa-forward"></i></button>
                </div>

                <div class="step">
                    <label>Informe seu whatsapp e idade</label>
                    <input
                        type="text"
                        id="whatsapp"
                        placeholder="Whatsapp"
                        name="whatsapp"
                        value="{{old('whatsapp')}}"
                        onkeypress="mask(this, mphone);"
                        onblur="mask(this, mphone);">
                    <input type="number" id="idade" placeholder="Idade" name="age" value="{{old('age')}}">
                    <button type="button" class="button-step" onclick="prevStep()"><i class="fa fa-backward"></i> Voltar</button>
                    <button type="button" class="button-step" onclick="nextStep()">Próximo <i class="fa fa-forward"></i></button>
                </div>

                <div class="step">
                    <label>Qual ala e data que precisa?</label>
                    <select id="ala" name="ward" value="{{old('ward')}}">
                        <option value="Liberdade">Ala Liberdade</option>
                        <option value="Jardin Paulistano">Ala Jardin Paulistano</option>
                        <option value="Presidente Médice">Ala Presidente Médice</option>
                        <option value="Prata">Ala Prata</option>
                        <option value="Bodocongó">Ala Bodocongó</option>
                        <option value="Malvinas">Ala Malvinas</option>
                        <option value="Sítio Lucas">Ala Sítio Lucas</option>
                        <option value="Queimadas">Ala Queimadas</option>
                        <option value="Não Membro">Não Membro</option>
                    </select>
                    <input type="text" id="date" placeholder="Data que precisa?" onfocus="(this.type='date')" name="date" value="{{old('date')}}">
                    <button type="button" class="button-step" onclick="prevStep()"><i class="fa fa-backward"></i> Voltar</button>
                    <button type="button" class="button-step" onclick="nextStep()">Próximo <i class="fa fa-forward"></i></button>
                </div>
                  <div class="step">
                    <label>Qual o tipo sanguíneo e quantidade?</label>
                    <select id="sangue" name="blood" value="{{old('blood')}}">
                        <option value="O+">O Positivo</option>
                        <option value="O-">O Negativo</option>
                        <option value="A+">A Positivo</option>
                        <option value="A-">A Negativo</option>
                        <option value="B+">B Positivo</option>
                        <option value="B-">B Negativo</option>
                        <option value="AB+">AB Positivo</option>
                        <option value="AB-">AB Negativo</option>
                        <option value="Qualquer tipo">Qualquer Tipo</option>
                    </select>
                    <input type="number" id="quantidade" placeholder="Quantas bolsas?" name="amount" value="{{old('amount')}}">
                    <button type="button" class="button-step" onclick="prevStep()"><i class="fa fa-backward"></i> Voltar</button>
                    <button type="button" class="button-step" onclick="nextStep()">Próximo <i class="fa fa-forward"></i></button>
                  </div>

                  <div class="step">
                    <label>Qual a prioridade e local?</label>
                    <select id="prioridade" name="priority" value="{{old('priority')}}">
                        <option value="Nâo urgente">Não urgente</option>
                        <option value="Urgência">Urgência</option>
                        <option value="Emergência">Emergência</option>
                    </select>
                    <select id="local" name="location" value="{{old('location')}}">
                        <option value="Trauma">Trauma</option>
                        <option value="HU">HU</option>
                        <option value="Upa dinamérica">Upa dinamérica</option>
                        <option value="Upa alto branco">Upa auto branco</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <button type="button" class="button-step" onclick="prevStep()"><i class="fa fa-backward"></i> Voltar</button>
                    <button class="button-step" type="submit">Enviar <i class="fa fa-paper-plane"></i></button>
                  </div>
            </form>
        </aside>
        <br>

        <article>
            <img src="../assets/img/help.png" alt="Preciso de doador">
        </article>
    </main>
    <script>
            // Get all the steps in the form
            const form = document.getElementById("formHome");
            const steps = form.querySelectorAll(".step");

            // Set the current step to the first step
            let currentStep = 0;

            // Function to go to the next step
        function nextStep() {
            // Hide the current step
            steps[currentStep].style.display = "none";
            // Increment the current step
            currentStep++;
            // Show the next step
            steps[currentStep].style.display = "block";
        }

        // Function to go to the previous step
        function prevStep() {
            // Hide the current step
            steps[currentStep].style.display = "none";
            // Decrement the current step
            currentStep--;
            // Show the previous step
            steps[currentStep].style.display = "block";
        }

        // Hide all steps except the first one
        for (let i = 1; i < steps.length; i++) {
            steps[i].style.display = "none";
        }

        // Submit the form when the last step is reached
        form.addEventListener("submit", (event) => {
            event.preventDefault();
            document.getElementById("formHome").submit();
            //form.addEventListener("submit");
            //alert("Form submitted!");
        });

    </script>
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

 <script>
    const switchModal = () => {
        const modal = document.querySelector('.modal-alert-landing')
        const actualStyle = modal.style.display;
        if(actualStyle == 'none'){
            modal.style.display = 'block';
        }
        else{
            modal.style.display = 'none';
        }
    }

    window.onclick = function(event){
        const modal = document.querySelector('.modal-alert-landing');
        if(event.target == modal){
            switchModal();
        }
    }
 </script>
</body>
</html>
