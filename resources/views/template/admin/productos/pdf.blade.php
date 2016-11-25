<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <title>Pdf</title>
</head>

<body>
<h1 class="text-center text-info">Lista de productos franquicia Coffenet</h1>



<div class="col-sm-12">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>estado</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>

        @foreach($productos as $producto)
        <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripsion}}</td>
            <td>{{$producto->estado}}</td>
            <td>{{$producto->valor}}</td>
            <td>{{$producto->cantidades}}</td>

        </tr>
@endforeach
        </tbody>
    </table>


</div>

</body>
</html>