    <!-- Page Content -->
    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header pull-left" style="margin:20px 0;">
                        My Profile
                    </h3>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- ========= Main =======-->
        <div class="row">
            <div class="col-lg-12" style="background: #F8F8F8; padding: 0;border:1px solid #ccc;">
                <div class="btn-group btn-group-justified" role="group">
                    <div class="btn-group" role="group">
                        <a href="#login" id="login-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-sign-in visible-xs"></i><span class="hidden-xs"><?php echo lang('account'); ?></span></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="#recovery" id="recovery-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-unlock visible-xs"></i><span class="hidden-xs"><?php echo lang('balance'); ?></span></a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="#register" id="register-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-user visible-xs"></i><span class="hidden-xs"><?php echo lang('support'); ?></span></a>
                    </div>
                </div>
                <div id="boxlogin">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1" id="register-content">
                            <form class="form-horizontal" role="form" id="register" method="post" action="<?php echo base_url(); ?>login/create_new_user">

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('company'); ?></label>
                                    <div class="col-sm-9" id="name-group">
                                        <input type="text" placeholder="Company" name="company" id="company" class="form-control">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('firstname'); ?></label>
                                    <div class="col-sm-9" id="name-group">
                                        <input type="text" placeholder="Nombre" name="name" id="name" class="form-control">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('lastname'); ?></label>
                                    <div class="col-sm-9" id="lastname-group">
                                        <input type="text" placeholder="Apellidos" name="lastname" id="lastname" class="form-control">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('email'); ?></label>
                                    <div class="col-sm-9" id="email-group">
                                        <input type="text" placeholder="Email" name="email" id="email" class="form-control">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('phone'); ?></label>
                                    <div class="col-sm-3" id="telephone-group">
                                        <input type="text" placeholder="Telefono" name="telephone" id="telephone" class="form-control bfh-phone" data-country="CR">
                                    </div>

                                    <label class="col-sm-3 control-label" for="textinput"><?php echo lang('born'); ?></label>
                                    <div class="col-sm-3" id="born-group">
                                        <div class="bfh-datepicker" data-min="01/15/1930" data-max="today" data-close="false" data-name="born">
                                            <input type="text" placeholder="Fecha nacimiento" name="born" id="born" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-default"><?php echo lang('btn_form_cancel'); ?></button>
                                            <button type="submit" class="btn btn-primary"><?php echo lang('btn_form_new_account'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div>
                <div id="boxrecovery"><!-- box user register -->
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        asd
                        </div>
                    </div>
                
                    
                </div><!-- end box user register -->

                <div id="boxregister">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <form method="post">
                                <div class="form-group">
                                    <label>Tipo de Consulta</label>
                                    <select name="ticket_request" id="ticket_request" class="form-control">
                                        <option value="template">Plantillas</option>
                                        <option value="balance">Estado de Cuenta</option>
                                        <option value="campaigns">Campañas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Consulta</label>
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
                </div> <!-- end 3 box -->
            </div>
        </div>
        
        <!-- /. ====== Main content -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->