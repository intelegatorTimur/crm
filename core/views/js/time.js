setInterval(function(){
    $.ajax({
        url:'http://'+window.location.host+'/ajax/time.php',
        type: 'post',
        data: '',
        success: function(data){
            $('.time').html(data);
        }
        
        
        
    });
    
    
},1000);