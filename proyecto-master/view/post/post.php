        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <?php
                    if (isset($_SESSION['success'])) {
                ?>  
                    <br>
                    <div class="panel panel-success" id="notificacion">
                        <div class="panel-heading"><b>Aviso</b>
                            <button type="button" class="close" data-target="#notificacion" data-dismiss="alert"> <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                            </button>
                        </div>
                        <div class="panel-body">
                            <b class="exito"><?php echo $_SESSION['success']; ?></b>
                        </div>
                    </div>
                <?php
                        unset($_SESSION['success']);
                    }
                ?>
                <h1 class="page-header">Publicaciones</h1>
                <?php
                    if (isset($_SESSION['session'])) {
                ?>
                <div class="well well-sm text-right">
                    <a class="btn btn-primary btn-color" href="?c=Blog&a=Crud">Nueva publicación</a>
                </div>
                 <br>
                <?php
                    }
                ?>
                <?php foreach($this->model->Listar() as $r): ?>
                    <h2><?php echo $r->titulo; ?></h2>
                    <p><b><?php echo $r->nombre.' '.$r->apellido.' | '.$r->fecha; ?></b>  <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id']==$r->usuario_id)) { ?><a class="pull-right" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Blog&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a> <?php } ?></p>
                    <hr>
                    <div class="text-box"><p><?php echo $r->texto; ?></p></div>
                    <br>
                    <h4><b>Comentarios</b></h4>
                    <?php foreach($this->model->Comentarios($r->id) as $c): ?>
                        <div class="comentarios">
                            <h5><b><?php echo $c->nombre.' '.$c->apellido; ?> dice:</b> <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id']==$c->usuario_id)) { ?><a class="pull-right" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Comment&a=Eliminar&id=<?php echo $c->id; ?>">Eliminar</a> <?php } ?></h5>
                            <p style=""><?php echo $c->texto; ?></p>
                        </div>
                        <br>
                    <?php endforeach; ?>
                    <br>
                    <?php if (isset($_SESSION['session'])) { ?>
                        <form id="frm-post" action="?c=Comment&a=Guardar" method="post">
                            <input type="hidden" name="publicacion_id" value="<?php echo $r->id; ?>" />
                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user_id']; ?>" />
                            <textarea name="texto" class="form-control" placeholder="Nuevo comentario" rows="4" required></textarea>
                            <br>
                            <div class="text-left">
                                <button class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    <?php } ?>
                    <hr>
                    <br>
                <?php endforeach; ?>
            </div>
        </div>

