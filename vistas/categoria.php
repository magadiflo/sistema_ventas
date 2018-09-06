<?php
  require_once 'header.php';
?>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title">Categoría <button class="btn btn-success" onclick="mostrarForm(true)"><i class="fa fa-plus-circle"></i>
                    Agregar</button></h1>
                <div class="box-tools pull-right">
                </div>
              </div>
              <!-- /.box-header -->
              <!-- centro -->
              <div class="panel-body table-responsive" id="listado_registros">
                <table id="tbl_listado" class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>Opciones</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Esto será lleno con el datatables -->
                  </tbody>
                </table>
              </div>
              <div class="panel-body" id="formulario_registros">
                <form action="" name="formulario" id="formulario" method="post">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="nombre">Nombre:</label>
                    <input type="hidden" name="id_categoria" id="id_categoria">
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="50" placeholder="Ingrese nombre" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" maxlength="256" placeholder="Ingrese descripción">
                  </div>
                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btn_guardar">
                      <span class="fa fa-save"></span> Guardar
                    </button>
                    <button class="btn btn-danger" type="button" onclick="cancelarForm()">
                      <span class="fa fa-arrow-circle-left"></span> Cancelar
                    </button>
                  </div>
                </form>
              </div>
              <!--Fin centro -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->


    </div><!-- /.content-wrapper -->
    <!--Fin-Contenido-->
<?php
  require_once 'footer.php';
?>
<script type="text/javascript" src="scripts/categoria.js"></script>