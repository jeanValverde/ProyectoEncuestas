<?php foreach ($preguntas as $pregunta) { ?>
    <div class="col-md-8 offset-2">
        <div class="card" style="padding: 20px;" >
            <div class="card-header">
                <h5 class="title"><?= $pregunta['pregunta'] ?></h5>
            </div>
            <div class="card-body">
                <!--Deje estos datos a modo de guía o ejemplo-->
                <!--  id_cuestionario , pregunta , descripcion, tipo, id_encuesta -->
                <!-- id_respuesta , respuesta, id_cuestionario, id_encuesta -->
                <div class="alert-info" style="padding: 10px;" > <i class="now-ui-icons travel_info"></i> Tipo de pregunta <?= ($pregunta['pregunta'] == true) ? 'Multiple' : 'Unica' ?> </div>
                <br>
                descripcion  
                <div class="button-container">

                    <?php if (isset($respuestas)) { ?>
                        <hr>
                        <?php foreach ($respuestas as $respuesta) { ?>
                            <?php if ($respuesta['id_cuestionario'] == $pregunta['id_cuestionario']) { ?>

                                <div  class="btn-secondary" style="padding: 5px;"  >
                                    &nbsp; &nbsp; <?= $respuesta['respuesta'] ?> &nbsp; &nbsp; 
                                    <button href="#" class="btn btn-primary"> 
                                        <i class="now-ui-icons travel_info"></i> Editar
                                    </button>
                                    <button href="#" class="btn btn-primary"> 
                                        <i class="now-ui-icons travel_info"></i> Eliminar
                                    </button>
                                </div>

                                <?php
                            }
                        }
                        ?><hr>
                    <?php } ?>

                    <?= form_open('encuestas/agregarRespuesta', array(/* 'onsubmit' => 'return validarIngresarRespuesta(this)' */)); ?>
                    <div class="row">
                        <div class="col-md-10 pr-1">
                            <div class="form-group">
                                <?= form_input(array('name' => 'id_cuestionario', 'type' => 'hidden', 'value' => $pregunta['id_cuestionario'])) ?>
                                <?= form_label('Respuesta', 'respuesta') ?>
                                <?= form_input(array('name' => 'respuesta', 'type' => 'text', 'class' => 'form-control', 'id' => 'respuesta', 'aria-dscribedby' => 'respuesta', 'placeholder' => 'Ingrese una respuesta')) ?>
                                <small id="emailHelp" class="form-text text-muted">Ingrese una respuesta</small>
                                <br>
                                <div id="errorRespuesta" class="all-width" ></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div style="height: 12px;" ></div>
                            <button class="btn btn-primary btn-round ">
                                <i class="now-ui-icons arrows-1_share-66"></i> Guardar
                            </button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>

    function validarIngresarRespuesta() {
        //valida por id del imput  
        var respuesta = document.getElementById("respuesta");

        var validoI = false;

        if (respuesta.value.length === 0 || respuesta.value === "") {
            document.getElementById("errorRespuesta").className = "alert alert-danger";
            document.getElementById("errorRespuesta").innerHTML = "Requerido";
        } else {
            document.getElementById("errorRespuesta").innerHTML = "";
            document.getElementById("errorRespuesta").className = "";
            validoI = true;
        }


        if (validoI === true) {
            return true;//cuando el formulario no tiene errores
        } else {
            return false;
        }


    }


</script> 