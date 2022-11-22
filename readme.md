# CRUD com PHP orientado a objetos
Código para criação de um CRUD feito em PHP orientado a objetos utilizando MySQL.


### Passo a passo
Clone Repositório
```sh
git clone https://github.com/GusAlberto/CRUD_SalaDeAula.git
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="CRUD SENAI"
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## Composer
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.


O Composer já será instalado para você no conteiner do Docker.

Confira a documentação do Composer:
[https://getcomposer.org/doc](https://getcomposer.org/doc/)
--
Suba os containers do projeto
```sh
docker-compose up -d
```

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```
Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já pode acessá-lo.

Acesse o projeto pelo seu navegador.
[http://localhost:8090](http://localhost:8090)


## Banco de dados
Crie um banco de dados e execute as instruções SQLs abaixo para criar a tabela `salas`:
```sql
  CREATE TABLE `salas` (
  	`id` INT(11) NOT NULL AUTO_INCREMENT,
  	`titulo` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
  	`descricao` TEXT(65535) NOT NULL COLLATE 'utf8_general_ci',
  	`ativo` ENUM('s','n') NOT NULL COLLATE 'utf8_general_ci',
  	`data` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  	PRIMARY KEY (`id`) USING BTREE
  )
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
  AUTO_INCREMENT=1;
```

## Configuração
As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente. 
(HOST, NAME, USER e PASS).
