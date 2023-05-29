<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Este é um projeto desenvolvido para ajudar as pessoas necessitadas de doação de sangue. Foi desenvolvido e pensado junto com lideres da Igreja de Jesus Cristo dos Santos do sÚltimos dias i=o qual em seu back-end foi utilizado o framework laravel na versão 9.x  


## Descrição de comandos para executar o projeto 

- Instalar o composer fazendo download dele seguindo a documentação do site: **[https://getcomposer.org/download](https://getcomposer.org/download)**
- O projeto foi criado com o comando composer create-project laravel/laravel=^9 back-laravel --prefer-dist
- Após criar o projeto executei o mesmo abrindo o prompt de comando do windows ou terminal do windows e executar o comando: php artisan serve
- Acessar o projeto no endereço: http://localhost:8000/

Ao baixar pela primeira vez pelo github será necessário instalar todas as depêndencias. Para isso basta executar o comando abaixo:
- composer install 

Foi criado os controllers e requests com os comandos abaixo:
- php artisan make:controller UserController

Foi criado os models com os seguintes comandos
- php artisan make:model Pessoa --seed --factory --migration

Para criar as tabela utilizei o comando:
- php artisan migrate

Para popular os registros de cidade, estados e hobbies utilizei o seeder do laravel. Basta dar o comando abaixo que ja está tudo configurado para criar os registros
- php artisan db:seed

Para bibliotecas de form utilizei o Laravel Collcetive Form
- composer require laravelcollective/html

Para mostrar o Gravatar utilizei a biblioteca creativeorange/gravatar
 - https://github.com/creativeorange/gravatar

 Para traduzir as mensagens de erro utilizei a biblioteca laravel-pt-BR-localizaition
  - https://github.com/lucascudo/laravel-pt-BR-localization

Para o alert utilizei o sweet alert da biblioteca realrashid/sweet-alert
- https://github.com/realrashid/sweet-alert

