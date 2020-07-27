# CRUD de clientes para o teste da HIBRIDO :)

Está é uma aplicação básica que emprega alguns conceitos de programação através de um exemplo de CRUD de clientes.
É aplicado neste excercicio conceitos como:

  - Orientação a objeto
  - MVC
  - Componentização

## Estrutura do projeto

  Os controles, modelos e views do projeto estão dentro da pasta App, ou seja, toda a parte logica e estrutura você encontrará aqui.
  Você também pode ver:
  - Pasta log: é armazenado o log de sistema, gerados por data e armazenados em JSON seguindo os padrões PSR-3;
  - Pasta App/Controllers: controle de dados e páginas navegadas no sistema;
  - Pasta App/Models: controle da interface com banco de dados;
  - Pasta App/Views: controle dos templates das páginas exibidas pelos controladores;
  - Pasta public: arquivo de inicialização do sistema, ele carrega o kernel;
  - Arquivo .env: variaveis de sistema, no momento deve conter apenas informações de banco dados;
  - Arquivo kernel.php: responsavel por carregar pacotes e variaveis de sistema.

## Bibliotecas usadas neste projeto
Neste projeto foram usadas algumas bibliotecas, são elas:
 | Plugin | README |
| ------ | ------ |
| psr/log | [Ir para o repositório][psr] |
| monolog/monolog | [Ir para o repositório][monolog] |
| vlucas/phpdotenv | [Ir para o repositório][dotenv] |

## Pré-requisitos
 - PHP 7.1+
 - MySQL 5.6+
 - Composer

## Instalação
Começe clonando o repositório, navegue pelo console até a pasta do projeto e isntale as dependencias:

```sh
$ cd crud
$ composer install
```
Crie ou edite o arquivo `.env` usando seu editor favorito e adicione as credenciais do banco de dados:
```sh
$ nano .env
```
Nele você deverá adicionar as seguintes linhas substituindo seus valores:
```
DB_NAME="um_nome_incrivel_para_seu_banco_de_dados"
DB_USER="meu_usuario"
DB_PASSWORD="minha_senha_segura"
DB_HOST="localhost"
DB_PORT=3306
```

Para iniciar o projeto pasta rodar o PHP a partir da pasta `public/` do projeto:

```sh
$ php -S localhost:8080 -t public/
```

Agora basta verificar através de qualquer navegador:

```sh
127.0.0.1:8080
```
Após isso basta navegar pelo sistema que ele irá configurar o banco de dados automaticamente.


   [psr]: <https://packagist.org/packages/psr/log>
   [monolog]: <https://github.com/Seldaek/monolog>
   [dotenv]: <https://github.com/vlucas/phpdotenv>

