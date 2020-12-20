<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <h1 class="page-header">
            Editar usuario
        </h1>

        <form id="frm-post" action="?c=User&a=Actualizar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $user->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required />
            </div>
            
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" value="<?php echo $user->apellido; ?>" class="form-control" placeholder="Ingrese su apellido" required />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="Ingrese un email" required />
            </div>
            
            <div class="form-group">
                <label>Nacionalidad</label>
                <input type="text" name="nacionalidad" value="<?php echo $user->nacionalidad; ?>" class="form-control" placeholder="Ingrese su nacionalidad" required />
            </div>            

            <div class="form-group">
                <label>Dirección</label>
                <textarea name="direccion" class="form-control" placeholder="Direccion" rows="5" required> <?php echo $user->direccion; ?></textarea> 
            </div>
            
            <hr />
            
            <div class="text-left">
                <button class="btn btn-success">Actualizar</button>
                <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
</div>