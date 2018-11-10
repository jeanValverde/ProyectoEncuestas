<div class="col-md-8 offset-2">
    <div class="card" style="padding: 20px;" >
        <div class="card-header">
            <h5 class="title">Cree una pregunta para la encuesta</h5>
        </div>
        <div class="alert-warning" style="padding: 30px;" > 
            <i class="now-ui-icons travel_info"></i>
            Las preguntas deben ser de dos tipos
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="">
                    Selecion multiples (Para multiples respuestas a una pregunta)
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
            <div class="form-check form-check-radio">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                    Selecion unica (Para solo una respuesta a la pregunta)
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </div>
        <div class="card-body">
            <!--Deje estos datos a modo de guía o ejemplo-->
            <!--  id_cuestionario , pregunta , descripcion, tipo, id_encuesta -->
            <?= form_open('encuestas/agregarPregunta', array('onsubmit' => 'return validarIngresar(this)')); ?>
            <div class="form-block">
                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group">
                            <?= form_label('Titulo de pregunta', 'titulo') ?>
                            <?= form_input(array('name' => 'pregunta', 'type' => 'text', 'class' => 'form-control col-md-12', 'id' => 'titulo', 'aria-dscribedby' => 'autor', 'placeholder' => 'Ingrese una título')) ?>
                            <small id="emailHelp" class="form-text text-muted">Ingrese un título</small>
                            <br>
                            <div id="errorTitulo" class="all-width" ></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= form_label('Tipo de Respuesta', 'tipo') ?>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <?= form_input(array('name' => 'tipo', 'type' => 'radio', 'class' => 'form-check-input', 'id' => 'tipo', 'aria-dscribedby' => '', 'checked' => 'true', 'value' => '0')) ?>
                                    Selección unica
                                    <span class="form-check-sign"></span>
                                </label>
                                <label class="form-check-label">
                                    <?= form_input(array('name' => 'tipo', 'type' => 'radio', 'class' => 'form-check-input', 'id' => 'tipo', 'aria-dscribedby' => '', 'value' => '1')) ?>
                                    Seleccion multiple
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">Ingrese tipo de respuesta</small>
                            <div id="errorTipo" class="all-width" ></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr1">
                        <div class="form-group">
                            <div class="form-group">
                                <?= form_label('Descripción opcional', 'descripcion') ?>
                                <?= form_textarea(array('name' => 'descripcion', 'class' => 'form-control', 'id' => 'descripcion', 'aria-dscribedby' => 'nombre', 'placeholder' => 'Máx. 500 caracteres', 'rows' => '3')) ?>
                                <small id="emailHelp" class="form-text text-muted">Ingrese una descripción</small>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-round" type="submit">
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

<script>
    function validarIngresar() {
        //validar los imput numericos y solo el opction de editorial   
        var titulo = document.getElementById("titulo");

        var tipo = document.getElementById("tipo"); //diferente de seleccione 



        var validoT = false;
        var validoTipo = false;




        if (titulo.value.length === 0 || titulo.value === "") {
            document.getElementById("errorTitulo").className = "alert alert-danger";
            document.getElementById("errorTitulo").innerHTML = "Requerido";
        } else {
            document.getElementById("errorTitulo").innerHTML = "";
            document.getElementById("errorTitulo").className = "";

            validoT = true;
        }




        if (tipo.value === "Seleccione") {
            document.getElementById("errorTipo").className = "alert alert-danger";
            document.getElementById("errorTipo").innerHTML = "Requerido";
        } else {
            document.getElementById("errorTipo").innerHTML = "";
            document.getElementById("errorTipo").className = "";
            validoTipo = true;
        }




        if (validoT === true && validoTipo === true) {
            return true;//cuando el formulario no tiene errores
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

</script> 
