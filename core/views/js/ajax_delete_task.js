$('.delete_button').on('click',function(e){
    e.preventDefault();
    var data_delete = $(this).attr('data-delete');
    
    $.ajax({
        url: 'http://'+window.location.host+'/ajax/delete_task.php',
        type: 'POST',
        data: 'delete='+data_delete,
        success: function(data){
            if(data == 1){
                alert("OK");
                window.location.href = window.location.href;
            }else{
                alert("not ok");
            }
        }

    });
});
