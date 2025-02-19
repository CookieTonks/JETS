<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="../../cssbs/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
        thead:before,
        thead:after {
            display: none;
        }

        tbody:before,
        tbody:after {
            display: none;
        }
    </style>

</head>

<body>
    <table class="table table-borderless">
        <thead>
            <tr>
                <td scope="col" style="font-size:xx-small;">
                    <img src="images/logo.png" width="100px">
                    <p>JETS MAQUINADOS ESPECIALIZADOS <br>
                        REGIO PARQUE INDUSTRIAL, 208.<br>
                        CP.66600 APODACA N.L<br>
                    </p>
                    <p>Telefono: 8112017841 <br></p>

                </td>

                <td scope="col" style="text-align: right; font-size:xx-small;">
                    <p class="h6" style="text-align: right;">Orden de Compra: {{$oc->id}} </p>

                    <img src="images/iso.png" width="95px">
                    <p><b>ISO 9001-2015</b></p>

                </td>
            </tr>
        </thead>
    </table>

    <table class="table table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th style="text-align:left;">OC</th>
                <th style="text-align:left;">COMPRADOR</th>
                <th style="text-align:left;">EMAIL</th>
                <th style="text-align:left;">TELEFONO</th>
                <th style="text-align:left;">FECHA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:left;">{{$oc->id}}</td>
                <td style="text-align:left;">{{$oc->usuario_alta}}</td>
                <td style="text-align:left;">correo@gmail.com</td>
                <td style="text-align:left;">811135598</td>
                <td style="text-align:left;">{{$oc->created_at}}</td>
            </tr>
        </tbody>
    </table>



    <table class="table table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">PROVEEDOR</th>
                <th colspan="1" style="text-align:left">DATOS DE FACTURACION</th>
                <th colspan="1" style="text-align:left">DIRECCION DE ENVIO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1"> {{$oc->proveedor}} </td>
                <td style="text-align: left;" colspan="1">
                    @if($oc->razon == "LUIS")
                    JOSE LUIS SILVA SANTOS, AMAPOLA 625 LOS TREBOLES APODACA N.L C.P 66600, RFC SISL8601078J4
                    @else
                    JETS MAQUINADOS ESPECIALIZADOS <br> REGIO PARQUE INDUSTRIAL <br> CP.66600 APODACA N.L
                    @endif
                </td>
                <td style="text-align: left;" colspan="1"> AV.REGIO PARQUE 208, PARQUE INDUSTRIAL REGIO APODACA N.L</td>
            </tr>
        </tbody>
    </table>


    <table class="table  table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">FORMA DE PAGO</th>
                <th colspan="1" style="text-align:left">CONDICIONES DE PAGO</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1"> {{$oc->forma_pago}} </td>
                <td style="text-align: left;" colspan="1"> {{$oc->condiciones}} </td>
            </tr>
        </tbody>
    </table>

    <table class="table " style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">OT</th>
                <th colspan="1" style="text-align:left">DESCRIPCION PARTIDA</th>
                <th colspan="1" style="text-align:left">UM</th>
                <th colspan="1" style="text-align:left">CANT</th>
                <th colspan="1" style="text-align:left">P/U</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($materiales as $material)
                <td style="text-align: left;" colspan="1"> {{$material->ot}} </td>
                <td style="text-align: left;" colspan="1"> {{$material->descripcion}} </td>
                <td style="text-align: left;" colspan="1"> {{$material->um}} </td>
                <td style="text-align: left;" colspan="1"> {{$material->cantidad_solicitada}} </td>
                <td style="text-align: left;" colspan="1"> ${{ number_format($material->pu, 2) }} </td>

                @endforeach
            </tr>
        </tbody>
    </table>

    <table class="table table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">SUBTOTAL</th>
                <th colspan="1" style="text-align:left">IVA</th>
                <th colspan="1" style="text-align:left">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1"> ${{ number_format($oc->subtotal, 2) }} </td>
                <td style="text-align: left;" colspan="1"> ${{ number_format($oc->iva, 2) }} </td>
                <td style="text-align: left;" colspan="1"> ${{ number_format($oc->subtotal + $oc->iva, 2) }} </td>
            </tr>
        </tbody>
    </table>


    <br>
    <table class="table table-sm" style="text-align:center; font-size: xx-small; width: 100%;">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">OBSERVACIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1">
                    <ol style="margin: 0; padding-left: 20px;">
                        <li>FAVOR DE MANDAR CERTIFICADO DE CALIDAD</li>
                        <li>AGREGAR A LA FACTURA EL FOLIO DE ORDEN DE COMPRA</li>
                        <li>ENTREGAR A DOMICILIO CON PAPELERÍA IMPRESA: ORDEN DE COMPRA, FACTURA, CERTIFICADO DE CALIDAD</li>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>



    <table class="table table-sm" style="font-size: xx-small; width: 100%; margin-top: 30px;">
        <tbody>
            <tr>
                <td><strong>AUTORIZA:</strong> ______________________________________</td>
                <td><strong>FIRMA:</strong> ________________________________________</td>
            </tr>
        </tbody>
    </table>





</html>