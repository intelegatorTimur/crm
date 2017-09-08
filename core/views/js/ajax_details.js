$('.a_details').on('click',function(e){
    e.preventDefault();
    var data_details = $(this).attr('data-details');
    
    $.ajax({
        url: 'http://'+window.location.host+'/ajax/details_task.php',
        type: 'POST',
        data: 'details='+data_details,
        success: function(data){
            
            console.log(data);
            var json = JSON.parse(data);

            
            $('.details').css("visibility","visible");
            
            $('.details_description').html(json.tasks_description);
            $('.details_name').html(json.tasks_name);
            
        }
        });
            
    });


$('.tasks_close').on('click','a',function(e){
    e.preventDefault();
    $('.details').css("visibility","hidden");
    
    
    
});
