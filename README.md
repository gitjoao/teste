## Aplicação desenvolvida para teste. 

Back-end é uma api REST feita em PHP(Framework Laravel);

Front-end foi utilizado Bootstrap, HTML, CSS e Javascript que consome a api.

## Instalação

Clonar este repositório 

```bash
cd teste 
```

```bash
cd back-end 
```

```bash
composer install
```

Abrir o arquivo **.env** no diretório de **./back-end** e configurar com seus dados
```bash
DB_CONNECTION=mysql
DB_HOST= your_host
DB_PORT= your_port
DB_DATABASE= your_data_base
DB_USERNAME= your_user
DB_PASSWORD= your_pass
```
Criar uma Base de Dados com o mesmo nome que está na DB_DATABASE no arquivo **.env**

Abri o **bash** dentro do diretório **./back-end** e rodar este comando 
para criar as tabelas e popular o banco com os dados iniciais

```bash
php artisan migrate:refresh --seed
```

Para start o servidor rodar o comando

```bash
php artisan serve
```

Entrar no diretório **./front-end** e abrir no navegador o arquivo **index.html**

## Pronto para uso

Caso tiver algum problema com CORS adicionar está [extensão](https://chrome.google.com/webstore/detail/moesif-orign-cors-changer/digfbfaphojjndkpccljibejjbppifbc) no Chrome

