$(document).ready(function($) {
	
	setColor();
	addCategory();

});

	function addCategory(){

	    $('form#campaign').on('submit', function(e) {
	        e.preventDefault(); // prevent native submit

	        var base_url = window.location.origin;

	        $(this).ajaxSubmit({
	            // dataType identifies the expected content type of the server response
	            url: base_url+'/campaign/manage',
	            type: 'POST',
	            dataType:  'json', // pre-submit callback
	            //data: cid,
	            success: function(data){
	                console.log(data);
	                $('#manage-campaign').modal('hide');
	            }
	        });
	    });

	}

	function setColor(){

		var options = {
		  colors:[['#337AB7', '#5CB85C', '#F0AD4E', '#D9534F']]
		}
		$('#colorpalette4').colorPalette(options)
		  .on('selectColor', function(e) {
		    $('#design').val(e.color);
		});


	}