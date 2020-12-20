<div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <h1 class="page-header">
            Nueva publicacion
        </h1>

        <form id="frm-post" action="?c=Blog&a=Guardar" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $post->id; ?>" />
            
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo" value="<?php echo $post->titulo; ?>" class="form-control" placeholder="Ingrese un título" required />
            </div>
            
            <div class="form-group">
                <label>Contenido</label>
                <textarea name="texto" class="form-control" placeholder="Contenido" rows="5" required> <?php echo $post->body; ?></textarea> 
            </div>
            
            <hr />
            
            <div class="text-left">
                <button class="btn btn-success">Guardar</button>
                <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
            </div>
        </form>
    </div>
</div>
