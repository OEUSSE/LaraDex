@extends('layouts.app')
@section('content')
    <div class="col">
        <form action="{{ url('/oauth/clients') }}" method="POST">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="redirect">Redirect</label>
                <input type="text" name="redirect" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="send" value="Enviar">Enviar</button>
            </div>
            {{ csrf_field() }}
        </form>
        <hr />
        <main class="list-clients">
            <h2>Clientes</h2>
            <table border="1">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Secret</th>
                    <th>Redirect</th>
                </thead>
                <tbody>
                   @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->secret }}</td>
                        <td>{{ $client->redirect }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <hr />
            <h2>Personal Access Tokens</h2>
            <form action="{{ url('/oauth/personal-access-tokens') }}" method="POST">
                <input type="text" name="name" placeholder="Nombre" />
                <input type="submit" value="Crear token personal" />
                {{ csrf_field() }}
            </form>
        </main>
    </div>
@endsection