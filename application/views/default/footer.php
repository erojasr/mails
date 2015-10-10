<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo assets_url(); ?>js/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo assets_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo assets_url(); ?>/apps/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?php echo assets_url(); ?>apps/BootstrapFormHelpers/dist/js/bootstrap-formhelpers.min.js"></script>
<script src="<?php echo assets_url(); ?>/js/admin.js"></script>
<?php

// load another js in the template
/**
 * Example add the js on the controller like this
 * $js_load = array(
 *     'datimepicker' => 'datimepicker.js',
 *     'another js' => 'another.js'
 * );
 *
 */

if(isset($js_load))
{
    foreach ($js_load as $key => $js)
    {
    	if($key == 'CDN')
    	{
        	?><script src="<?php echo $js; ?>"></script><?php
    	}
        else
        {
	        ?><script src="<?php echo assets_url().$js; ?>"></script><?php
        }
    }

}

?>



</body>
</html>