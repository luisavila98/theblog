<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <h1 class="page-header">
            Nuevo usuario
        </h1>

        <form id="frm-post" action="?c=User&a=Guardar" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nombre</label><span style="color:red">*</span>
                <input type="text" name="nombre" value="" class="form-control" placeholder="Ingrese su nombre" required />
            </div>
            
            <div class="form-group">
                <label>Apellido</label><span style="color:red">*</span>
                <input type="text" name="apellido" value="" class="form-control" placeholder="Ingrese su apellido" required />
            </div>

            <div class="form-group">
                <label>Email</label><span style="color:red">*</span>
                <input type="text" name="email" value="" class="form-control" placeholder="Ingrese un email" required />
            </div>
            
            <div class="form-group">
                <label>Contraseña</label><span style="color:red">*</span>
                <input type="password" name="password" value="" class="form-control" placeholder="Ingrese una contraseña" required />
            </div>
            
            <div class="form-group">
                <label>Nacionalidad</label>
                <input type="text" name="nacionalidad" value="" class="form-control" placeholder="Ingrese su nacionalidad"/>
            </div>            

            <div class="form-group">
                <label>Dirección</label><span style="color:red">*</span>
                <textarea name="direccion" class="form-control" placeholder="Direccion" rows="5" required></textarea> 
            </div>
            
            <hr />
            
            <div class="text-left">
                <button class="btn btn-success">Guardar</button>
                <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
</div>