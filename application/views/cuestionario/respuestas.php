<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Respuesta</h5>
        </div>
        <div class="card-body">
            <!--Deje estos datos a modo de guía o ejemplo-->
            <?= form_open('usuario/agregarLibro', array('onsubmit' => 'return validarIngresar(this)')); ?>
            <div class="row">
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <?= form_label('Respuesta', 'respuesta') ?>
                        <?= form_input(array('name' => 'respuesta', 'type' => 'text', 'class' => 'form-control', 'id' => 'respuesta', 'aria-dscribedby' => 'respuesta', 'placeholder' => 'Ingrese una respuesta')) ?>
                        <small id="emailHelp" class="form-text text-muted">Ingrese una respuesta</small>
                        <div id="errorRespuesta" class="all-width" ></div>

                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>

    function validarIngresar() {
        //valida por id del imput  
        var respuesta = document.getElementById("respuesta");

        var validoI = false;

        if (respuesta.value.length === 0 || respuesta.value === "") {
            document.getElementById("errorRespuesta").className = "alert alert-danger";
            document.getElementById("errorRespuesta").innerHTML = "Requerido";
        } else {
            document.getElementById("errorRespuesta").innerHTML = "";
            document.getElementById("errorRespuesta").className = "";

        }


        if (validoI === true) {
            return true;//cuando el formulario no tiene errores
        } else {
            return false;
        }


    }
    

</script> 