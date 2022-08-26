# Como iniciar o projeto:

```
Colocar .env no folder main_database e no test_database.

Em seguida:
docker-compose -f backend/docker-compose.yml up -d
docker-compose -f main_database/docker-compose.yml up -d
docker-compose -f test_database/docker-compose.yml up -d
```

## Configurações

Configurar .env do backend para se conectar ao banco de dados.
```
docker-compose exec php bash
composer install
php artisan migrate
php artisan passport:install
php artisan passport:keys
```

### Laravel passport
https://laravel.com/docs/9.x/passport

Modelo de request para gerar token.
```
.-----------------------------.
| grant_type:password         |
| client_id:client_id         |
| client_secret:client_secret |
| username:username           |
| password:password           |
.-----------------------------.

**Importante**: Para testar a request corretamente deve constar o header:
.-------------------------------------------------.
| Content-Type: application/x-www-form-urlencoded |
.-------------------------------------------------.
na requisição
```

# Testes

Pada rodar os testes deve-se configurar o .env.testing

##### variáveis importantes:

| Conexão Primária  | Conexão Secundária      |
| ----------------- |:---------------------:  |
| DB_CONNECTION     | DB_SECONDARY_CONNECTION |
| DB_HOST           | DB_SECONDARY_HOST       |
| DB_DATABASE       | DB_SECONDARY_PORT       |
| DB_PORT           | DB_SECONDARY_DATABASE   |
| DB_USERNAME       | DB_SECONDARY_USERNAME   |
| DB_PASSWORD       | DB_SECONDARY_PASSWORD   |

```
A conexão primária no caso dos testes seria a test_database, usando
o conector pgsql.
A principal usaria o conector pgsql_secondary, disponível em
config/database.php.
```

##### Rodando Testes
```
No container do PHP:

php artisan test
flags:
Para rodar testes encontrados sob certos diretórios apenas, usar o filter:
php artisan test --filter="Folder/"
OU
php artisan test --filter="Folder//NomeArquivoTest"

Importante:
Nunca rodar testes na base principal, o criador de testes base já barra isso.
Somente rodar algum teste na base principal se for um caso isolado como
verificação de existência de Password Granter no banco, referente ao
Passport.
```





