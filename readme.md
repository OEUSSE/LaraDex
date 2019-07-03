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
### Client Credentials Grant Tokens
Con este tipo de grant no hay necesidad de tener un usuario en la DB para poder obtener un token.
Se debe especificar que tipo de grant vamos a utilizar, en este caso sería el grant `client_credentials`

```js
const clientID = 6;
const clientSecret = 'NhkM5j7oCd58VscmYILNlEN08HnaS4r4O7eZyTHz';
const grantType = 'client_credentials';

let token = document.getElementById('token');
let clientCredentials = localStorage.getItem('client_credentials');

if (clientCredentials) {
    // Si ya existe el token en el localStorage se muestra el mensaje de autenticado
    document.getElementById('wrapper').innerHTML = '¡Autenticado!';

    fetch('http://127.0.0.1:8000/api/clients/posts', {
        method: 'POST',
        body: JSON.stringify({
            title: 'Prueba',
            body: 'Esto es una prueba usando Client Credentials'
        }),
        headers: { 'Authorization': 'Bearer '+clientCredentials, 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error(error))
    return;
}

// Si el token no existe en el localStorage, al dar click al botón generará un nuevo token
token.addEventListener('click', e => {
    e.preventDefault();

    fetch('http://127.0.0.1:8000/oauth/token', {
        method: 'POST',
        body: JSON.stringify({
            client_id: clientID,
            client_secret: clientSecret,
            grant_type: grantType
        }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        localStorage.setItem('client_credentials', data.access_token);
        location.reload();
    })
    .catch(error => console.error(error))
})
```

Este token al momento de crearse no se asigna a ningun usuario.
El fin de este gran no que el usuario tenga que ingresar a la plataforma para poder obtener un token para acceder a los recursos,
si no que solo con tener un cliente creado en la plataforma se obtener un token.

Llevandolo al mundo real, este tipo de grant podría ser útil en situaciones donde tengamos que una tarea programa, que siempre esté consultando recursos.
Como por ejemplo en un blog, donde cada cierto tiempo se esté creando un nuevo post haciendo uso de la API.