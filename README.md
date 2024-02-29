[PHP__BADGE]: https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white
[LARAVEL__BADGE]: https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white
[VUE__BADGE]: https://img.shields.io/badge/vuejs-%2335495e.svg?style=for-the-badge&logo=vuedotjs&logoColor=%234FC08D
[JAVASCRIPT__BADGE]: https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E
[POSTGRES_BADGE]: https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white
[DOCKER_BADGE]: https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white


<h1 align="center" style="font-weight: bold;">Teste Prático - WebQuarto 💻</h1>

<div align="center">
  
![vue][VUE__BADGE]
![javascript][JAVASCRIPT__BADGE]
![php][PHP__BADGE]
![laravel][LARAVEL__BADGE]
![postgres][POSTGRES_BADGE]
![docker][DOCKER_BADGE]

</div>

<p align="center">
 •  <a href="#started">Início</a> • 
  <a href="#db">Esquema Banco de Dados</a> • 
  <a href="#run">Rodando o projeto</a> • 
  <a href="#routes">API Endpoints</a>
</p>

<p align="center">
  <b>Projeto desenvolvido como parte do teste técnico do processo seletivo da WebQuarto</b>
</p>

<h2 id="started">🚀 Getting started</h2>

<h3>Pré requisitos</h3>

- [Docker](https://www.docker.com/)
- [Node](https://nodejs.org/en)
- [PHP](https://www.php.net/)
- [npm](https://www.npmjs.com/)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)

<h3 id="db">Esquema Banco de Dados</h3>

<div id="db" width="200px">
  
<img src="https://github.com/belloLucas/webquart-test/assets/68472772/90655b71-4dfb-4e12-a9b8-75fbd9b4a06f" alt="database schema" width="600px">

</div>

<h3 id="run">Clonando</h3>

Clone o projeto:

```bash
git clone https://github.com/belloLucas/webquart-test
```

<h3> Variáveis de Ambiente </h3>

Dentro do diretório backend (`/backend`) renomeie o arquivo `.env.example` para `.env`

<h3>Iniciando</h3>

Como iniciar o projeto:

<h3> Backend: </h3>

```bash
cd webquarto-test/backend
composer install
docker-compose build
docker-compose up -d
docker exec webquarto php artisan migrate
``````

Após o container estar rodando, a API ficará disponível na url `localhost:8000`

<h3> Frontend: </h3>

```bash
cd webquarto-test/frontend
npm install
npm run dev
``````

Depois de executar o `npm run dev` a aplicação front end deverá estar disponível na url `localhost:5173`. Se certifique disso.


<h2 id="routes">📍 API Endpoints</h2>

Here you can list the main routes of your API, and what are their expected request bodies.
​
| route               | description                                          
|----------------------|-----------------------------------------------------
| <kbd>GET /api/houses</kbd>     | Retorna uma lista de todas as casas cadastradas [response details](#get-houses-detail)
| <kbd>GET /api/houses/{house_id}</kbd>     | Retorna a casa com o id correspondente passado na url [request details](#post-house-detail)
| <kbd>GET /api/user/houses/{user_id}</kbd>     | Retorna todas as casas cadastradas pelo usuário com id correspondente passado na url [request details](#get-user-houses-detail)
| <kbd>POST /api/houses</kbd>     | Cria uma casa com as informações passadas no corpo da requisição [request details](#post-create-house-detail)
| <kbd>PATCH /api/houses/{house_id}</kbd>     | Edita a casa com id correspondente com as informações passadas no corpo da requisição [request details](#patch-house-edit-detail)
| <kbd>DELETE /api/houses/{house_id}</kbd>     | Deleta a casa com id correspondente [request details](#delete-house-detail)
| <kbd>GET /api/users</kbd>     | Retorna todos os usuários cadastrados [request details](#get-users-detail)
| <kbd>GET /api/users/{user_id}</kbd>     | Retorna o usuário com id correspondente [request details](#get-user-detail)
| <kbd>POST /register</kbd>                 | Registra um novo usuário com as informações passadas no corpo da requisição [request details](#register)
| <kbd>POST /login</kbd>                    | Autentica um usuário com base nas informações passadas no corpo da requisição e comparadas as informações do banco de dados[request details](#login)
| <kbd>POST /logout</kbd>                   | Encerra a sessão do usuário [request details](#logout)
| <kbd>POST /api/comments</kbd>     | Cria um comentário com as informações passadas no corpo da requisição [request details](#post-comments-detail)
| <kbd>GET /api/comments/{house_id}</kbd>     | Retorna todos os comentários criados em uma casa específica, com base no id dela [request details](#get-comments-from-house-detail)


<h3 id="get-users-detail">GET /api/users </h3>

**RESPONSE**
```json
{
   "id": 2,
   "email": "email@email.com",
   "created_at": "2024-02-26T20:07:26.000000Z",
   "updated_at": "2024-02-26T20:07:26.000000Z",
   "name": "jane",
   "email_verified_at": null
},
...
```

<h3 id="get-user-detail">GET /api/users/{user_id} </h3>

**RESPONSE**
```json
{
   "id": 2,
   "email": "email@email.com",
   "created_at": "2024-02-26T20:07:26.000000Z",
   "updated_at": "2024-02-26T20:07:26.000000Z",
   "name": "jane",
   "email_verified_at": null
},
```

<h3 id="register">POST /register </h3>

**REQUEST**
```json
{
  "name": "John Doe",
  "email": "test@example.com",
  "password": "4444444"
}
```

<h3 id="login">POST /login </h3>

**REQUEST**
```json
{
  "email": "test@example.com",
  "password": "4444444"
}
```

<h3 id="logout">POST /logout </h3>

**REQUEST**
```json
{}
```

<h3 id="get-houses-detail">GET /api/houses </h3>

**RESPONSE**
```json
{
   "id": 10,
   "user_id": 1,
   "house_title": "Apartamento",
   "house_description": "completo",
   "rent_price": 950,
   "street": "Rua 1",
   "neighborhood": "Bairro 2",
   "city": "Cidade 1",
   "state": "Minas Gerais",
   "created_at": "2024-02-27T19:42:21.000000Z",
   "updated_at": "2024-02-27T19:42:21.000000Z",
   "house_picture": "teste",
   "bedrooms": 2,
   "restrooms": 2,
   "bills_included": true
},
{
   "id": 11,
   "user_id": 1,
   "house_title": "Apartamento 2",
   "house_description": "apartamento completo",
   "rent_price": 900,
   "street": "Rua 2",
   "neighborhood": "Bairro 2",
   "city": "Cidade 2",
   "state": "Estado 2",
   "created_at": "2024-02-27T21:47:11.000000Z",
   "updated_at": "2024-02-27T21:47:11.000000Z",
   "house_picture": "teste",
   "bedrooms": 1,
   "restrooms": 1,
   "bills_included": true
},
```

<h3 id="get-house-detail">GET /api/houses/{house_id} </h3>

**RESPONSE**
```json
{
    "id": 10,
    "user_id": 1,
    "house_title": "Apartamento",
    "house_description": "completo",
    "rent_price": 950,
    "street": "Rua 1",
    "neighborhood": "Bairro 2",
    "city": "Cidade 1",
    "state": "Minas Gerais",
    "created_at": "2024-02-27T19:42:21.000000Z",
    "updated_at": "2024-02-27T19:42:21.000000Z",
    "bedrooms": 2,
    "restrooms": 2,
    "bills_included": true
}
```

<h3 id="get-user-houses-detail">GET /api/user/houses/{user_id} </h3>

**RESPONSE**
```json
{
{
   "id": 10,
   "user_id": 1,
   "house_title": "Apartamento",
   "house_description": "completo",
   "rent_price": 950,
   "street": "Rua 1",
   "neighborhood": "Bairro 2",
   "city": "Cidade 1",
   "state": "Minas Gerais",
   "created_at": "2024-02-27T19:42:21.000000Z",
   "updated_at": "2024-02-27T19:42:21.000000Z",
   "bedrooms": 2,
   "restrooms": 2,
   "bills_included": true
},
{
   "id": 11,
   "user_id": 1,
   "house_title": "Apartamento 2",
   "house_description": "apartamento completo",
   "rent_price": 900,
   "street": "Rua 2",
   "neighborhood": "Bairro 2",
   "city": "Cidade 2",
   "state": "Estado 2",
   "created_at": "2024-02-27T21:47:11.000000Z",
   "updated_at": "2024-02-27T21:47:11.000000Z",
   "bedrooms": 1,
   "restrooms": 1,
   "bills_included": true
},
...
}
```

<h3 id="post-create-house-detail">POST /api/houses </h3>

**REQUEST**
```json
{
  "user_id": "1",
  "house_title": "Titulo da casa",
  "house_description": "Descrição da casa",
  "rent_price": 900,
  "bedrooms": 1,
  "restrooms": 1,
  "bills_included": true,
  "street": "Rua 1",
  "neighborhood": "Bairro 1",
  "city": "Cidade 1",
  "state": "Estado 1",
}
```

<h3 id="patch-house-edit-detail">PATCH /api/houses/{house_id} </h3>

**REQUEST**
```json
{
  "house_title": "Titulo da casa",
  "house_description": "Descrição da casa",
  "rent_price": 900,
  "bedrooms": 1,
  "restrooms": 1,
  "bills_included": true,
  "street": "Rua 1",
  "neighborhood": "Bairro 1",
  "city": "Cidade 1",
  "state": "Estado 1",
}
```

<h3 id="delete-house-detail">DELETE /api/houses/{house_id} </h3>

**REQUEST**
```json
{
  "house_id": 10
}
```

<h3 id="post-comments-detail">POST /api/comments </h3>

**REQUEST**
```json
{
  "house_id": 1,
  "user_id": 1,
  "comment": "Lorem Ipsum",
  "avaliation_note": 4
}
```

<h3 id="get-comments-from-house-detail">GET /api/comments/{house_id} </h3>

**RESPONSE**
```json
{
  "comment": "test comment",
  "avaliation_note": 4,
  "name": "Test User"
}
```
