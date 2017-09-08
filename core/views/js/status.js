function quer() {
    $.ajax({
        url: 'http://'+window.location.host+'/ajax/status.php',
        type: 'POST',
        data: 'online=1',
        success: function(data){
            var result;
            var json = JSON.parse(data);
            var cls = "";

            $.each(json,function(k,v){

                if(v.chief_online == 0){
                    cls = "indicator_off";
                }else{
                    cls = "indicator_on";
                }

                result +="<tr><td>"+v.chief_name+" ("+v.job_name+")</td><td><span class='"+cls+"'></span></td></tr>";

            });
            $(".idic tbody").html(result);
        }
    });
}


quer();



setInterval(function(){
   
    quer();
    
},600000);