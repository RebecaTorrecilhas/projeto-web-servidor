# projeto-web-servidor

Projeto da matéria Desenvolvimento Web-Servidor

## :wrench: Setup para o projeto PHP

- Na pasta database importar o arquivo `dump_inicial.sql` e em seguida rodar `update_database.sql` no seu MySql;
- Na pasta do projeto PHP modifique o `./utils/Constants.php` com os acessos necessários para bancos de dados;
- Para rodar: `php -S localhost:8000`;

## 🔀 Versões para o projeto PHP

- MySQL 8.0;
- PHP 7.3;

## :wrench: Setup para o projeto Laravel

- Na pasta do laravel rodar `composer install`, `cp .env.example .env`, `php artisan key:generate` e `php artisan migrate`;
- Na pasta do laravel modificar o `.env` com os acessos necessários para banco de dados, disparo de e-mail, etc;
- Para rodar: `php artisan serve`;

## 🔀 Versões para o projeto laravel

- MySQL 8.0;
- PHP 8.0;

## ⚠️ Observações

- Biblioteca do postman disponível com os endpoints da API em laravel;

### Integrantes

- Andre Tohouca Lacomski;
- Luiz Guilherme Monteiro;
- Rebeca Torrecilhas;

### Desenvolvimento
 - Andre:
 - Luiz:
 - Rebeca: