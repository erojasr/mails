    <!-- Page Content -->
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-sm-2 col-md-8 col-md-offset-2" style="background: #F8F8F8; padding: 0;margin-top:5%;border:1px solid #ccc;">
                            <div class="btn-group btn-group-justified" role="group">
                                <div class="btn-group" role="group">
                                    <a href="#login" id="login-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-sign-in visible-xs"></i><span class="hidden-xs"><?php echo lang('login'); ?></span></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="#recovery" id="recovery-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-unlock visible-xs"></i><span class="hidden-xs"><?php echo lang('forgot'); ?></span></a>
                                </div>
                                <div class="btn-group" role="group">
                                    <a href="#register" id="register-slide" class="btn btn-default" style="border-radius: 0 !important;"><i class="fa fa-user visible-xs"></i><span class="hidden-xs"><?php echo lang('register'); ?></span></a>
                                </div>
                            </div>
                            <div id="boxlogin">
                                <div class="omb_login">
                                    <div class="row omb_row-sm-offset-3 omb_socialButtons">
                                        <div class="col-xs-4 col-sm-2">
                                            <a href="#" class="btn btn-block omb_btn-facebook">
                                                <i class="fa fa-facebook visible-xs"></i>
                                                <span class="hidden-xs">Facebook</span>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 col-sm-2">
                                            <a href="#" class="btn btn-block omb_btn-twitter">
                                                <i class="fa fa-twitter visible-xs"></i>
                                                <span class="hidden-xs">Twitter</span>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 col-sm-2">
                                            <a href="#" class="btn btn-block omb_btn-google">
                                                <i class="fa fa-google-plus visible-xs"></i>
                                                <span class="hidden-xs">Google+</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row omb_row-sm-offset-3 omb_loginOr">
                                        <div class="col-xs-12 col-sm-6">
                                            <hr class="omb_hrOr">
                                            <span class="omb_spanOr">or</span>
                                        </div>
                                    </div>

                                    <div class="row omb_row-sm-offset-3">
                                        <div class="col-xs-12 col-sm-6" style="margin-top: 15px;margin-bottom: 15px;">
                                            <form class="omb_loginForm" id="login" action="login/validate_user" autocomplete="off" method="POST">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control" name="email" placeholder="email address">
                                                </div>
                                                <span class="help-block"></span>

                                                <div class="input-group" style="margin-bottom:20px;">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input  type="password" class="form-control" name="password" placeholder="Password">
                                                </div>
                                                <!--<span class="help-block">Password error</span>-->
                                                <div class="notification"></div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-7">
                                                        <button class="btn btn-primary btn-block" type="submit"><?php echo lang('btn_form_login'); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="boxregister"><!-- box user register -->

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1" id="register-content">
                                        <form class="form-horizontal" role="form" id="register" method="post" action="<?php echo base_url(); ?>login/create_new_user">

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

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="textinput"><?php echo lang('password'); ?></label>
                                                <div class="col-sm-9" id="password-group">
                                                    <input type="password" placeholder="Contraseña" name="password" id="password" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="textinput"><?php echo lang('repassword'); ?></label>
                                                <div class="col-sm-9" id="repassword-group">
                                                    <input type="password" placeholder="Repetir contraseña" name="repassword" id="repassword" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-6 control-label"><?php echo lang('captcha'); ?></label>
                                                <div class="col-sm-3" id="code-group">
                                                    <input type="text" placeholder="Ingrese el codigo" name="code" id="code" class="form-control">
                                                </div>
                                                <div class="col-sm-3" id="captcha">
                                                    <?php echo $image; ?>
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
                            </div><!-- end box user register -->

                            <div id="boxrecovery">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <form class="form-horizontal" role="form">

                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="textinput"><?php echo lang('register_email'); ?></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        <input type="text" placeholder="Correo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="pull-right">
                                                        <button type="submit" class="btn btn-primary"><?php echo lang('btn_form_recovery'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.col-lg-12 -->
                                </div><!-- /.row -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="msg"><!-- Place at bottom of page --></div>