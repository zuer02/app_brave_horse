@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
<div class="card w-25 ">
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $cliente->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{ $cliente->nome }}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $cliente->email }}</td>
                </tr>
                <tr>
                    <th scope="row">Telefone</th>
                    <td>{{ $cliente->telefone }}</td>
                </tr>

            </tbody>
        </table>
        
        <div class="d-flex justify-content-center column-gap-3">
            <a class="btn btn-primary" href="{{ route('cliente.index') }}" role="button">Voltar</a>
            <a class="btn btn-secondary" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}" role="button">Editar</a>
            <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                @method('DELETE')
                @csrf
                <!-- <button type="submit">Excluir</button>  -->
                <a href="#" class="btn btn-danger" role="button" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
            </form>
        </div>
        
    </div>
</div>
</div>


@endsection