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
                Aquí va el formulario
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