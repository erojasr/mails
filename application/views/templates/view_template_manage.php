    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="margin:20px 0;">Plantillas</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <!-- content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title pull-left">Nueva Plantilla</h4>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="<?php echo base_url(); ?>templates" class="btn btn-primary">Mis Plantillas</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        
                        <form method="post">
                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control">
                                <p class="help-block">Titulo encabezado del correo.</p>
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea class="form-control" id="editor1" name="editor1"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'editor1',
                                    {
                                        toolbar : 'Basic',
                                        startupMode : 'source'
                                    });
                                </script>
                            </div>

                            <button type="submit" class="btn btn-default">Agregar Plantilla</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- /.content -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->