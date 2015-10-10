$(document).ready(function(){
    //tabledit();
    loadCategories();

    addCategory();
    //alert(urlGetParameters);
});

function tabledit(){
    $('#example1').Tabledit({
    url: 'http://clipsnippet.com/categories/load',
    //rowIdentifier: 'data-id',
    hideIdentifier: true,
    editButton: true,
    restoreButton: false,
    buttons: {
        delete: {
            class: 'btn btn-sm btn-danger',
            html: '<span class="glyphicon glyphicon-trash"></span> &nbsp DELETE',
            action: 'delete'
        },
        confirm: {
            class: 'btn btn-sm btn-default',
            html: 'Are you sure?'
        },
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
            action: 'edit'
        }
    },
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'category_name'], [2, 'status','{"1": "Activo", "0": "Inactivo"}']]
    },
    onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
    });
}

function addCategory(){

    $('form#new-cat').on('submit', function(e) {
        e.preventDefault(); // prevent native submit
        var cid = '';
        if(urlGetParameters != null){
            var cid = {cid:urlGetParameters};
        }

        $(this).ajaxSubmit({
            // dataType identifies the expected content type of the server response
            url: 'http://clipsnippet.com/categories/store',
            type: 'POST',
            dataType:  'json', // pre-submit callback
            data: cid,
            success: function(data){
                //console.log(data);
                $('#modal-categories').modal('hide');
                loadCategories();
            }
        });
    });

}

function loadCategories(){

    var cid = '';
    var showButton = '';
    if(urlGetParameters != null){
        var cid = {cid:urlGetParameters};
        showButton = 'style="display:none;"';
    }
    $("#example1 tbody tr").remove();
    $.ajax({
        type: 'GET',
        url: 'http://clipsnippet.com/categories/load',
        data: cid,
        dataType: 'json',
        success: function(data){
            var prepare = "";
            $.each(data, function(i, item){
                prepare += '<tr><td scope="row">'+item.id+'</td><td>'+item.category_name+'</td><td>'+item.status+'</td><td style="white-space: nowrap; width: 1%;"><a href="categories/'+item.id+'" class="btn btn-sm btn-info" '+showButton+'>Sub-categorias</a></td></tr>';
            });

            $("#example1 tbody").append(prepare);
            tabledit();

        }
    });
}

/*Get the url parameters*/
var urlGetParameters =  (function (){
    var url = null;
    var pathArray = window.location.pathname.split( '/' );
    if($.isNumeric(pathArray[2])){
        url = pathArray[2];
    }
    return url;
})();

/*json get values*/
var json = (function () {
    var json = null;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://clipsnippet.com/categories/load',
        dataType: 'json',
        success: function(data){
            // aqui tenemos el json en la data, ahora debemos convertir esto
            // en el formato de editable
            json = data;
        }
    });
    return json;
})(); 
