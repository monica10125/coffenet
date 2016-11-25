<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Factura</title>

    <style>

        body{
            margin: 30px;
        }
        #linea{

            color:#0000cc;
            border: solid;


        }

        #detalle{
            color: #0f0f0f;

        }
    </style>
</head>

<body>
<h1 class="text-center">Factura no. {!!$factura['consecutivo'] !!}</h1>

<h4>
<address>
    <strong>Franquicia Coffenet</strong><br>
    {!!$factura['fecha']!!} <br>
    Ciudad, Bogotá<br>
    <abbr title="Phone">Tel; </abbr> 4825296

</address>

</h4>



<hr id="linea">


<div class="col-sm-12">

    <h3>
    <p>
        Facturador : {!!$factura['facturador']!!}
    </p>
        <p>
        Usuario solicitante: {!!$factura['usuario']!!}
        </p>


    </h3>

</div>

<hr>


        <h3 id="detalle">Detalle</h3>






<hr>

<div class="row">

    <div class=" col-xs-5 col-md-6">

        <h3>$ Subtotal: {!!$factura['subtotal']!!}</h3>
        <br>

        <h3>Iva: {!!$factura['iva']!!} %</h3>

    </div>

    <div class=" col-xs-5 col-md-6">

        <h3>$ Total: {!!$factura['total'] !!} </h3>
        <br>



    </div>

</div>

</body>
</html>