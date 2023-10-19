@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><a class="btn btn-primary" href="{{ route('cliente.create') }}" role="button">Novo Cliente</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td><a href=" {{ route('cliente.show', ['cliente' => $cliente->id ]) }}">Visualizar</a></td>
                <td><a href=" {{ route('cliente.edit', ['cliente' => $cliente->id ]) }}">Editar</a></td>
                <td> 
                    <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                        @method('DELETE')
                        @csrf
                        <!-- <button type="submit">Excluir</button>  -->
                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
            @endforeach

            <!-- <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            </tr> -->
        </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ $clientes->previousPageUrl() }}">Voltar</a></li>
                
                @for($i = 1; $i <= $clientes->lastPage(); $i++)
                    <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                
                <li class="page-item"><a class="page-link" href="{{ $clientes->nextPageUrl() }}">Próximo</a></li>
            </ul>
        </nav>
        
    </div>
</div>
@endsection