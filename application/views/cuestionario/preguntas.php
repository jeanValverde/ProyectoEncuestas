<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Cuestionario</h5>
        </div>
        <div class="card-body">
            <!--Deje estos datos a modo de guía o ejemplo-->
            <?= form_open('usuario/agregarLibro', array('onsubmit' => 'return validarIngresar(this)')); ?>
            <div class="form-block">
                <div class="form-group">
                    <?= form_label('Titulo de pregunta', 'titulo') ?>
                    <?= form_input(array('name' => 'titulo', 'type' => 'text', 'class' => 'form-control col-md-6', 'id' => 'titulo', 'aria-dscribedby' => 'autor', 'placeholder' => 'Ingrese una título')) ?>
                    <small id="emailHelp" class="form-text text-muted">Ingrese un título</small>
                    <div id="errorTitulo" class="all-width" ></div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= form_label('Tipo de Respuesta','tipo')?>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="tipo" name="tipo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tipo de respuesta
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php
                                $options = array(
                                    "Seleccione" => "seleccione",
                                    "SelecciónU" => "Selección única",
                                    "SelecciónM" => "Selección múltiple",
                                );
                                echo form_dropdown('Tipo de respuesta', $options, 'Seleccione', 'class="dropdown-item" id="tipo"');
                                ?>
                                    
                                </div>
                                
                            </div>
                            <small id="emailHelp" class="form-text text-muted">Ingrese tipo de respuesta</small>
                            <div id="errorTipo" class="all-width" ></div>
                        </div>
                    </div>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        Opción 1
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                        Opción 1
                        <span class="form-check-sign"></span>
                    </label>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                        Opción 2
                        <span class="form-check-sign"></span>
                    </label>
                </div>
                <hr>
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
