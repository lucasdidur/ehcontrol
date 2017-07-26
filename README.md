## EhControl - Painel de controle

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

EhControl � um painel de em desenvolvimento para o gerenciamento de servidores de jogos de minecraft.

Conta com as principais ferramentas necess�rias para gerenciar um servidor como:

* Gerenciamento do servidor (ver status, parar, iniciar, etc.)
* Gerenciamento de permiss�es do servidor e usu�rios.
* Gerenciamento da loja interna do jogo, com integra��o a outro gateways de pagamento.
* Gerenciamento de puni��es do servidor.
* Entre outras ferramentas.


## Como instalar

Configure o banco de dados e execute os comandos de instala��o.

    $ composer install
    $ php artisan migrate
    $ php artisan make:seeder UserTableSeeder
    $ php artisan serve


Dados de acesso

    Login: teste@teste.com
    Senha: teste

## Informa��es Legais

Este � um projeto privado, n�o sendo permitido a sua distribi��o sem autoriza��o.
