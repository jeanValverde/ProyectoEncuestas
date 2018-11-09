<?php foreach ($encuestas as $encuesta) { ?>
<div class="col-md-8 offset-2">
    <div class="card card-user">
        <div class="image">
            <img src="<?= base_url(); ?>public/img/imgfondo.png" alt="...">
        </div>
        <div class="card-body">
            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="https://static1.squarespace.com/static/59057732b3db2ba7ea01fbb3/t/5b4d3a110e2e72ef36adb973/1531787821313/icon-2967800_1280.png" alt="...">
                    <h5 class="title"><?= $encuesta['nombre'] ?></h5>
                </a> fecha_creacion, fecha_termino, valor_base, nombre, estado, descripcion 
                <p class="description">
                    <?= $encuesta['fecha_creacion'] ?>
                </p>
            </div>
            <p class="description text-center">
                 <?= $encuesta['descripcion'] ?>
                <br/>
                <a href="#" class="btn btn-primary">
                <?= $encuesta['estado'] ?>
                <i class="fab fa-google-plus-g"></i>
               </a>
                <a href="#" class="btn btn-secondary">
                Fecha de termino <?= $encuesta['fecha_termino'] ?>
               </a>
                <a href="#" class="btn btn-secondary">
                Valor base <?= $encuesta['valor_base'] ?>
               </a>
            </p>
        </div>
        <hr>
        <div class="button-container">
            <button href="#" class="btn btn-primary"> Editar
                <i class="fab ui-2_settings-90"></i>
            </button>
            <button href="#" class="btn btn-secondary btn-danger"> Eliminar
            </button>
            
        </div>
    </div>
</div>
<?php } ?>
