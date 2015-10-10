
<!-- Page Content -->
<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header" style="margin:20px 0;"><?php echo lang('admin_manage_snippet_categories'); ?></h3>
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
                    <h4 class="panel-title pull-left">
                    <?php  
                    echo (isset($title_category) != FALSE)?'Categoria '.$title_category:"Categorias";
                    ?>
                    </h4>
                    <div class="pull-right">
                        <div class="btn-group">
                            <?php  
                            if(isset($sub_add) && $sub_add != FALSE)
                            {
                                ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-categories">Nueva Subcategoria</button>
                                <?php
                            }
                            else
                            {
                                ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-categories">Nueva Categoria</button>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    //var_dump($list_categories);
                    ?>
                    <table class="table datatable table-striped table-bordered table-editable" id="example1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- Modal -->
<div class="modal fade" id="modal-categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Categoria</h4>
            </div>
            <div class="modal-body">
                <form id="new-cat">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Nueva Categoria">
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