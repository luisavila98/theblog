<div class="row">
    <div class="col-md-4 col-md-offset-4 col-xs-12" style="min-height: 450px;">
        <br>
        <h1 class="page-header text-center">
            Iniciar sesión
        </h1>
        <form id="frm-login" action="?c=Login&a=Login" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Usuario</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Ingrese su correo" required />
            </div>
            
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Ingrese su contraseña" required />
            </div>
            
            <hr />
            
            <div class="text-center">
                <button class="btn btn-primary btn-color">Ingresar</button>
                <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
            </div>
            <br>
            <br>
            <?php
                if(isset($_GET['error'])){
                    echo '<div class="text-center error"><b>Usuario y/o contraseña inválidos</b><br></div>';
                }
            ?>
        </form>
    </div>
</div>