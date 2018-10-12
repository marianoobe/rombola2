<html>

<head>
    <title>User list - PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">


</head>

<body>

    <div class="panel panel-default">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div align="justify" class="myform-top-top">
                    </div>
                    <h5><i>Compra - Venta - Consignaciones - Gestoría</i></h5>
                    <p class="text-primary">.text-primary</p>
                    <h6>Direccion</h6>
                    <hr>
                    <h6><strong>I.V.A RESPONSABLE MONOTRIBUTO</strong></h6>
                </div>
                
                <div class="col-sm-4">
                    <h3>PREVENTA</h3>
                    <h6>DOCUMENTO NO VALIDO COMO FACTURA</h6>
                    <label for="numfac"><strong>N°: </strong></label>
                    <div class="form-group">
                        <p></p>
                        <label for="vendedor"><strong>Fecha</strong>: </label>
                        <label for=""></label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="panel panel-default">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <p></p>
                        <label><strong>Vendedor</strong>: </label>
                        <label id="vendedor"></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label><strong>Nombres y Apellidos</strong>: </label>

                        <label id="nombapell" value=""></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label><strong>Correo Electrónico</strong>: </label>
                        <label id="email"></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label><strong>Teléfono</strong>: </label>
                        <label id="telefono"></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label><strong>Auto de Interés</strong>: </label>
                        <label id="auto_interes"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="panel panel-default">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div ALIGN="center" class="box-header with-border">
                            <h3 class="box-title">DETALLE</h3>
                        </div>
                        <div class="form-group">
                            <p></p>
                            <textarea name="" id="detalle" cols="170" rows="5"></textarea>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div ALIGN="center" class="box-header with-border">
                    <h3 class="box-title">FORMA DE PAGO</h3>
                </div>
                <div class="form-group">
                    <p></p>
                    <label for="vendedor"><strong>Auto que entrega</strong>: </label>
                    <label for=""></label>
                </div>
                <div class="form-group">
                    <p></p>
                    <label for="vendedor"><strong>Contado</strong>: </label>
                    <label for=""></label>
                </div>
                <div class="form-group">
                    <p></p>
                    <label for="vendedor"><strong>Financiación</strong>: </label>
                    <label for=""></label>
                </div>
                <section id="financiado">
                    <div ALIGN="center" class="box-header with-border">
                        <h4 class="box-title">Detalles de Financiación</h4>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label for="vendedor"><strong>Nombre de Financiera</strong>: </label>
                        <label for=""></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label for="vendedor"><strong>Cantidad de Cuotas</strong>: </label>
                        <label for=""></label>
                    </div>
                    <div class="form-group">
                        <p></p>
                        <label for="vendedor"><strong>Importe Total</strong>: </label>
                        <label for=""></label>
                    </div>
                </section>
                <div ALIGN="center" class="panel-footer">
                    <h6>Los precios consignados son meramente informativos</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
  <div class="row">
    <div class="col-6">
      One of three columns
    </div>
    <div class="col-6">
      One of three columns
    </div>
  </div>
</div>

</body>

</html>