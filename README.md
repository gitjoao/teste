## back-end e front-end

back-end: é uma api rest feita em PHP(Framework Laravel)

front-end: foi utilizado Bootstrap, HTML, CSS e Javascript

## Instalação

clonar este repositório 

```bash
cd teste 
```

```bash
cd back-end 
```

```bash
composer install
```

Abrir o arquivo **.env** no diretório de **./back-end**
```bash
DB_CONNECTION=mysql
DB_HOST= your_host
DB_PORT= your_port
DB_DATABASE= your_data_base
DB_USERNAME= your_user
DB_PASSWORD= your_pass
```
Criar uma Base de Dados com o mesmo nome que esta na DB_DATABASE no arquivo **.env**

Abri o **bash** dentro do diretório **./back-end** e rodar o comando 
```bash
php artisan migrate:refresh --seed
```
Para criar as tabelas e popular o banco com os dados iniciais

Start o servidor 
```bash
php artisan serve
```
Entrar no diretório **./front-end** e abri no navegador o arquivo **index.html**

Caso tiver algum erro por conta do CORS adicionar essa [extensão](https://chrome.google.com/webstore/detail/moesif-orign-cors-changer/digfbfaphojjndkpccljibejjbppifbc) do chrome

