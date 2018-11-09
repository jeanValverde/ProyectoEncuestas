<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Nueva encuesta</h5>
        </div>
        <div class="card-body" style="margin: 20px;" >
            <!-- deje los datos del libro a modo de ejemplo -->
            <?= form_open('Encuestas/crearEncuesta', array('onsubmit' => 'return validarIngresar(this)')); ?>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <?= form_label('Nombre', 'nombre') ?>
                        <?= form_input(array('name' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'id' => 'nombre', 'aria-dscribedby' => 'titulo', 'placeholder' => 'Ingrese nombre de encuesta', 'values' => 'Ej: Encuesta 1')) ?>
                        <small id="emailHelp" class="form-text text-muted">Ingrese nombre de encuesta</small>
                        <br/>
                        <div id="errorNombre" class="all-width" ></div>
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <?= form_label('Fecha de término', 'fecha_termino') ?>
                        <?= form_input(array('name' => 'fecha_termino', 'type' => 'date', 'class' => 'form-control', 'id' => 'fechaTermino', 'aria-dscribedby' => 'nombre', 'placeholder' => 'Ingrese fecha de termino')) ?>
                        <small id="emailHelp" class="form-text text-muted">Ingrese una fecha de termino</small>
                        <br/>
                        <div id="errorFechaTermino" class="all-width" ></div>

                    </div>
                </div>
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <?= form_label('Valor base', 'valor_base') ?>
                        <?= form_input(array('name' => 'valor_base', 'type' => 'number', 'class' => 'form-control', 'id' => 'valorBase', 'aria-dscribedby' => 'nombre', 'placeholder' => 'Ingrese un valor')) ?>
                        <small id="emailHelp" class="form-text text-muted">Ingrese valor</small>
                        <br/>
                        <div id="errorValorBase" class="all-width" ></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pr1">
                    <div class="form-group">
                        <div class="form-group">
                            <?= form_label('Descripción', 'descripcion') ?>
                            <?= form_textarea(array('name' => 'descripcion', 'class' => 'form-control', 'id' => 'descripcion', 'aria-dscribedby' => 'nombre', 'placeholder' => 'Máx. 500 caracteres', 'rows' => '3')) ?>
                            <small id="emailHelp" class="form-text text-muted">Ingrese una descripción</small>
                            <br/>
                            <div id="errorDescripción" class="all-width" ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pr-1 btn-left">
                    <button class="btn btn-primary btn-round ">
                        <i class="now-ui-icons arrows-1_share-66"></i> Guardar
                    </button>
                    <?php echo form_close(); ?>
                </div>
                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<script>

    function validarIngresar() {
        //validar los imput numericos y solo el opction   
        var nombre = document.getElementById("nombre");
        var fechaTermino = document.getElementById("fechaTermino");
        var descripcion = document.getElementById("descripcion"); //diferente de seleccione 
        var valorBase = document.getElementById("valorBase");

        var validoN = false;
        var validoFT = false;
        var validoD = false;
        var validoVB = false;


        if (nombre.value.length === 0 || nombre.value === "") {
        document.getElementById("errorNombre").className = "alert alert-danger";
        document.getElementById("errorNombre").innerHTML = "Requerido";
        } else {
        document.getElementById("errorNombre").innerHTML = "";
        document.getElementById("errorNombre").className = "";
        validoN = true;
        }



        if (descripcion.value.length === 0 || descripcion.value === "") {
        document.getElementById("errorDescripción").className = "alert alert-danger";
        document.getElementById("errorDescripción").innerHTML = "Requerido";
        } else {
        document.getElementById("errorDescripción").innerHTML = "";
        document.getElementById("errorDescripción").className = "";
        validoD = true;
        }


        if (valorBase.value.length === 0 || valorBase.value === "") {
        document.getElementById("errorValorBase").className = "alert alert-danger";
        document.getElementById("errorValorBase").innerHTML = "Requerido";
        } else {
        document.getElementById("errorValorBase").innerHTML = "";
        document.getElementById("errorValorBase").className = "";

            if (!validarNumero(paginas.value)) {
            document.getElementById("errorValorBase").className = "alert alert-danger";
            document.getElementById("errorValorBase").innerHTML = "Debe ser número";
            } else {
            document.getElementById("errorValorBase").innerHTML = "";
            validoVB = true;
            }

        }
        
        if(!validarFormatoFecha(fechaTermino.value)){
            document.getElementById("errorFechaTermino").className = "alert alert-danger";
            document.getElementById("errorFechaTermino").innerHTML = "Requerido";
        }else{
            document.getElementById("errorFechaTermino").innerHTML = "";
            document.getElementById("errorFechaTermino").className = "";
            validoFT = true;
        }
        

        if (validoN === true && validoD === true && validoVB === true) {
        return true; //cuando el formulario no tiene errores
        } else {
        return false;
        }
                
    }



    function validarNumero(numero) {
        //si es numero return true
        if (numero > 0 & numero <= 9999999999999) {
        return true;
        } else {
        return false;
        }

    }
    
    /*
     * Esta función nos validará utilizando una expresión regular si
     * nuestra variable corresponde con el formato de una fecha corriente, 
     * como por ejemplo – 13/09/1985. Devolverá true si la fecha es correcta y 
     * false si es incorrecta o la variable está vacía.
     * @param {date} campo
     * @returns {Boolean}
     */
    
    function validarFormatoFecha(campo) {
      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if ((campo.match(RegExPattern)) && (campo!='')) {
            return true;
      } else {
            return false;
      }
}



</script> 