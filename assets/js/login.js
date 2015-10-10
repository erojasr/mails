$(document).ready(function(){
    login();
    switch_login_register();
    register_new_user();

});

function login(){

    $body = $("body");
    $('form#login').on('submit', function(e) {
        e.preventDefault(); // prevent native submit
        $(this).ajaxSubmit({
            // dataType identifies the expected content type of the server response
            dataType:  'json',

            // success identifies the function to invoke when the server response
            // has been received
            beforeSubmit: function(){
                $body.addClass("loading");
            },  // pre-submit callback
            success: function(data){
                setTimeout(function() {
                    $body.removeClass("loading");
                    if (data.success == 1) {
                        window.location.replace(data.redirect);
                    }else{
                        $('.notification').html('<div class="alert alert-danger" id="error" style="padding:7px !important;" role="alert">'+data.msg+'</div>');
                        setTimeout(function(){
                            $('#error').fadeOut('fast');
                        }, 3000);
                    }
                }, 3000);
            }
        });
    });
}

function register_new_user()
{
    $('form#register').on('submit', function(e) {
        e.preventDefault(); // prevent native submit

        $('#name-group').removeClass('has-error'); // remove the error class
        $('#lastname-group').removeClass('has-error'); // remove the error class
        $('#email-group').removeClass('has-error'); // remove the error class
        $('#telephone-group').removeClass('has-error'); // remove the error class
        $('#born-group').removeClass('has-error'); // remove the error class
        $('#password-group').removeClass('has-error'); // remove the error class
        $('#repassword-group').removeClass('has-error'); // remove the error class
        $('#code-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $(this).ajaxSubmit({
            // dataType identifies the expected content type of the server response
            dataType:  'json',

            // success identifies the function to invoke when the server response
            // has been received
            beforeSubmit: function(){
                $body.addClass("loading");
            },  // pre-submit callback
            success: function(data){
                setTimeout(function() {
                    $body.removeClass("loading");
                    if (data.success == 1) {
                        console.log(data);
                        //window.location.replace(data.redirect);

                        $("form#register").slideUp();

                        var mensaje = [];

                        mensaje.push('<div class="row">');
                        mensaje.push('<div class="col-sm-6 col-md-12">');
                        mensaje.push('<div class="alert-message alert-message-success" style="overflow:hidden;">');
                        mensaje.push('<h4>');
                        mensaje.push('Bienvenido '+data.user);
                        mensaje.push('</h4>');
                        mensaje.push('<p>');
                        mensaje.push(data.msg);
                        mensaje.push('</p>');
                        mensaje.push('<div class="pull-right"><a href="'+data.redirect+'" class="btn btn-default">Aceptar</a></div>')
                        mensaje.push('</div></div></div>');

                        $("#register-content").append(mensaje.join(""));

                        //setTimeout(function(){
                        //    window.location.replace(data.redirect);
                        //}, 30000000);

                    }else{

                        $.each(data.errors, function(key, val) {
                            $("#"+key+"-group").addClass('has-error');
                            $("#"+key+"-group").append('<div class="help-block">' + val + '</div>');
                        });

                        if(data.image){
                            $("#captcha").html(data.image);
                        }
                    }
                }, 1000);
            }
        });
    });
}

function switch_login_register(){

    // set default login
    // only run the first time when the page is loaded
    $(window).one('load', function(){
        var tab = location.hash;
        display_tab(tab);
    });

    // run when the page is loaded and hash is change
    $(window).on('hashchange', function(){
        var tab = location.hash;
        display_tab(tab);

    });

}

function display_tab(tab){
    switch(tab){
        case '#login':

            $("#login-slide").addClass("selected");
            $("#recovery-slide").removeClass("selected");
            $("#register-slide").removeClass("selected");

            $("#boxlogin").slideDown();

            $("#boxregister").hide();
            $("#boxrecovery").hide();

            break;
        case '#recovery':
            $("#login-slide").removeClass("selected");
            $("#recovery-slide").addClass("selected");
            $("#register-slide").removeClass("selected");

            $("#boxrecovery").slideDown();

            $("#boxregister").hide();
            $("#boxlogin").hide();
            break;

        case '#register':
            $("#login-slide").removeClass("selected");
            $("#recovery-slide").removeClass("selected");
            $("#register-slide").addClass("selected");

            $("#boxregister").slideDown();

            $("#boxlogin").hide();
            $("#boxrecovery").hide();
            break;
        default:
            $("#login-slide").addClass("selected");
            $("#recovery-slide").removeClass("selected");
            $("#register-slide").removeClass("selected");

            $("#boxlogin").slideDown();

            $("#boxregister").hide();
            $("#boxrecovery").hide();
            break;
    }
}