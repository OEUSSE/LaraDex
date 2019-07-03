# LaraDex
CRUD de entrenadores pokemon.

## Instalación

    composer install && npm install
Si ocurre un error con las versiones

    composer install --ignore-platform-reqs && npm-install

## Laravel Passport

### Password Grant Tokens

Una vez creado un cliente usamos el client_id y el client_secret para generar un token.
Hay que tener en cuenta que el usuario que va a ingresar debe estar registrado.

```js
const clientID = 5;
const clientSecret = 'wiEtTFEIES3JfgDMqECXXmSTyc2VbOecgeoPiffq';
const grantType = 'password';

let login = document.getElementById('login');

login.addEventListener('click', e => {{
    e.preventDefault();

    fetch('http://127.0.0.1:8000/oauth/token', {
        method: 'POST',
        body: JSON.stringify({
            client_id: clientID,
            client_secret: clientSecret,
            grant_type: grantType,
            username: document.getElementById('email').value,
            password: document.getElementById('password').value
        }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        localStorage.setItem('token', data.access_token)
    })
    .catch(error => console.error(error))
}})
```

Si el resultado fue exitoso se guarda dicho token en el localStorage para posteriormente consumir
recursos de la API.
El token generado de enviarse por las cabeceras el request
```js
let token = localStorage.getItem('token');

if (token) {
    token = 'Bearer '+token;
    fetch('http://127.0.0.1:8000/api/posts', {
        method: 'GET',
        headers: { 'Authorization': token }
    })
    .then(response => {
        return response.json()
    })
    .then(data => {
        data.posts.forEach(post => {
            let li = document.createElement('li')
            li.textContent = post.title

            document.getElementById('list-container').append(li)
        });
    })
    .catch((error) => {
        console.log('error ' + error);
    });
```