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
 
    <form action="/enviar" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
      </div>
 
      <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" id="rg" name="rg" class="form-control" placeholder="RG">
      </div>
 
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF">
      </div>
 
      <button type="submit" class="btn btn-default">Enviar</button>
      <a href="{{url('/lista/Nome')}}" class="btn btn-primary">Cancelar</a>
    </form>
 
</div>
 
</body>
</html>