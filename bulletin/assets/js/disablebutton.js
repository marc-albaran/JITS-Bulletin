var $title = $('#title');
var $details = $('#details');
var $button = $('#post');

setInterval(function(){
    if($title.val().length > 0 && $details.val().length > 0 ){
        $button.attr('disabled', false);
    }else{
        $button.attr('disabled', true);
    }
});


