<html>
<head>
    <title>Lista de Pessoas</title>
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 
</head>
<body>
 
<div class="container">
 
    <h1>Lista de pessoas</h1>
 
    <hr />
    <a href="{{url('/dados')}}" class="btn btn-primary mr-1">Incluir</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th><a href="{{ url('/lista/Nome') }}">Nome</a></th>
          <th><a href="{{ url('/lista/RG') }}">RG</a></th>
          <th><a href="{{ url('/lista/CPF') }}">CPF</a></th>
          <th>Comandos</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pessoas as $row)
        <tr>
          <th scope="row">{{ $row->id }}</th>
          <td>{{ $row->nome }}</td>
          <td>{{ $row->rg }}</td>
          <td>{{ $row->cpf }}</td>
          <td>
            <a href="{{url('/editar/' . $row->id)}}" class="btn btn-primary mr-1">Editar</a>
            <a href="{{url('/deletar/' . $row->id)}}" class="btn btn-primary">Deletar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  @php
    $anterior = $pessoas->currentPage() == 1 ? 'disabled' : ''; 
  @endphp
  <nav aria-label="Navegação de página exemplo">
    <ul class="pagination">
      <li class="page-item {{ $anterior }}">
        <a class="page-link" href="{{ $pessoas->previousPageUrl() }}" aria-label="Anterior">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Anterior</span>
        </a>
      </li>
      
      @for ($i = 1; $i <= $pessoas->lastPage(); $i++)
        @if($pessoas->currentPage() == $i)
          <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
        @else
          <li class="page-item"><a class="page-link" href="{{ $pessoas->url($i) }}">{{ $i }}</a></li>
        @endif
      @endfor
      @php 
        $proximo = $pessoas->currentPage() == $pessoas->lastPage() ? 'disabled' : ''; 
      @endphp
      <li class="page-item {{ $proximo }}">
        <a class="page-link" href="{{  $pessoas->nextPageUrl() }}" aria-label="Próximo">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Próximo</span>
        </a>
      </li>
    </ul>
  </nav>

</div>
 
</body>
</html>