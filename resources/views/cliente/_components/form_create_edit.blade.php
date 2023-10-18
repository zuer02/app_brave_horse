@if(isset($cliente->id))
<form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('cliente.store') }}">
    @csrf
@endif
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="name" name="nome" value="{{ $cliente->nome ?? old('nome') }}" class="form-control">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="{{ $cliente->email ?? old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telefone</label>
    <input class="form-control" name="telefone" value="{{ $cliente->telefone ?? old('telefone') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
