    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header" style="margin:0px 0px 20px;padding-bottom:0px;">
                        <h3 class="pull-left" style="margin:20px 0;">Mis Campañas</h3>
                        <div class="pull-right">
                            <div class="btn-group" style="bottom:15px;position:relative;top:15px;">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#manage-campaign">Nueva Campaña</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <!-- content -->
        
        <?php 
        if(isset($campaigns) && $campaigns != FALSE)
        {
            $i = 0;

            echo '<div class="row">';
            foreach ($campaigns as $campaign) {
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-<?php echo $campaign['design']; ?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h4><?php echo $campaign['campaign'] ?></h4>
                                    <div>Campaña</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                $i++;
                if ($i%4 == 0) echo '</div><div class="row">';
            }
        }
        else
        {
            ?>
            <div class="alert alert-info">
                No tienes campañas creadas en la cuenta, para crear una campaña de click en el boton de <strong>Nueva campaña.</strong>
            </div>
            <?php
        }
        ?>
        <!-- /.row -->

        <!-- /.content -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Modal -->
<div class="modal fade" id="manage-campaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Campaña</h4>
            </div>
            <div class="modal-body">
                <form id="campaign">
                    <div class="form-group">
                        <label>Nombre Campaña</label>
                        <input class="form-control" name="campaign" id="campaign">
                    </div>
                    <div class="form-group">
                        <label>Color de Campaña</label>
                        <input id="design" name="design" class="form-control">
                        <div id="colorpalette4"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>