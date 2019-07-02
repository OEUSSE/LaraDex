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
                    <th>Nombre</th>
                    <th>Secret</th>
                    <th>Redirect</th>
                </thead>
                <tbody>
                   @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->secret }}</td>
                        <td>{{ $client->redirect }}</td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </main>
    </div>
@endsection