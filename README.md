# projeto-web-servidor

Projeto da matéria Desenvolvimento Web-Servidor

## :wrench: Setup

- Na pasta database importar o arquivo `dump_inicial.sql` e em seguida rodar `update_database.sql` no seu MySql;
- Na pasta do projeto modifique o `./utils/Constants.php` com os acessos necessários para bancos de dados;
- Para rodar: `php -S localhost:8000`;

## 🔀 Versões

- MySQL 8.0;
- PHP 7.3;

## ⚠️ Observações

### Integrantes

- Andre Tohouca Lacomski;
- Luiz Guilherme Monteiro;
- Rebeca Torrecilhas;

### Desenvolvimento

- Andre: Estrutura base e padronização de MVC;
- Luiz: Correção das rotas de view e chamadas dos Controllers;
- Rebeca: Design e validações de esqueceu senha e recuperar senha;

### Faltando

- Finalizar implementações de listagem de usuários, favoritos e seguidores;
- Conectar telas faltantes para o DB;
- Melhorar as validações de erros;