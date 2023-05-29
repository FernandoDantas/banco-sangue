<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/fonts.css" rel="stylesheet">
    <link href="assets/css/media.css" rel="stylesheet">
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
            <a href="."><li>Início</li></a>
            <a href="https://www.instagram.com/hemocentrocg/" target="_blank"><li>Hemocentro</li></a>
            <a href="#"><li>Sobre</li></a>
            <a href="https://api.whatsapp.com/send/?phone=558333445475&text&type=phone_number&app_absent=0" target="_blank"><li>Contato</li></a>
            <a href="#" id="inscreva-se-btn"><li>Já tem uma conta?</li></a>
        </ul>
    </header>

    <main>
        <aside>
            <h2><span>Inscreva-se agora</span></h2>
            <h2>doe Sangue!</h2>
            <p>
                Uma doação pode ser a salvação! Doar sangue ajuda a salvar vidas.
            </p>
            <form id="formHome">
                    <input type="text" id="nome" placeholder="Nome">
                    <input type="email" id="email" placeholder="E-mail">
                    <input type="text" id="whatsapp" placeholder="Whatsapp">
                    <input type="text" id="idade" placeholder="Idade">
                    <button type="button" class="button-step" onclick="nextStep(1)">Quero doar sangue <i class="fa fa-heart"></i></button>
            </form>
        </aside>
        <br>

        <article>
            <img src="assets/img/doar-e-viver.png" alt="doar-sangue">
        </article>
    </main>
</body>
</html>
