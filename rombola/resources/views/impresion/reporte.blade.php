
@include('adminlte::layouts.partials.htmlheader')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm">
                        LOGO
                    </div>
                    <div class="col-sm">
                        <h3>PREVENTA</h3>
                        <h6>DOCUMENTO NO VALIDO COMO FACTURA</h6>
                        <p>N° </p>
                        <label for="fecha">Fecha: </label>
                        <input type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
            <h2>Panel Heading</h2>
            <div class="panel panel-default">
              <div class="panel-heading">Panel Heading</div>
              <div class="panel-body">Panel Content</div>
            </div>
          </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                One of three columns
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                One of three columns
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                    <input class="ff_elem" data-original-title="Cambie a AUTO o MOTO, para que el campo dominio tenga formato de patente según lo elegido." type="text" name="ff_nm_date[]"value=""id="inp-dominio"/>
                    <input class="ff_elem" type="text" name="ff_nm_phone[]" value=""id="ff_elem1535"/>
            </div>
        </div>
    

    <script>
                 
            $(function($){
                $("#inp-dominio").mask("99/99/9999");
                $("#ff_elem1535").mask("(999) 999-9999");
                $("#ff_elem1178").mask("999-99-9999");
           });

    </script>
