## EhControl - Painel de controle

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

EhControl é um painel de em desenvolvimento para o gerenciamento de servidores de jogos de minecraft.

Conta com as principais ferramentas necessárias para gerenciar um servidor como:

* Gerenciamento do servidor (ver status, parar, iniciar, etc.)
* Gerenciamento de permissões do servidor e usuários.
* Gerenciamento da loja interna do jogo, com integração a outro gateways de pagamento.
* Gerenciamento de punições do servidor.
* Entre outras ferramentas.


## Como instalar

Configure o banco de dados e execute os comandos de instalação.

    $ composer install
    $ php artisan migrate
    $ php artisan make:seeder UserTableSeeder
    $ php artisan serve


Dados de acesso

    Login: teste@teste.com
    Senha: teste

## Informações Legais

Este é um projeto privado, não sendo permitido a sua distribição sem autorização.
