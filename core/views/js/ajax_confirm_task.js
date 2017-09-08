$('.tc').on('click',function(){
   
    var data_confirm = $(this).attr('data-target');
    
    var data_id = $(this).attr('data-id');

    
    $.ajax({
        url: 'http://'+window.location.host+'/ajax/confirm_task.php',
        type: 'POST',
        data: 'target='+data_confirm+'&id='+data_id,
        success: function(data){
            console.log(data)
            if(data == 1){
                window.location.href=window.location.href;
        }else{
            alert(0);
        }
        }
    });
});