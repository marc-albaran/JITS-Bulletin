var $username = $('#username');
var $password = $('#password');
var $loginbutton = $('#login');

setInterval(function(){
    if($username.val().length > 0 && $password.val().length > 0 ){
        $loginbutton.attr('disabled', false);
    }else{
        $loginbutton.attr('disabled', true);
    }
});
