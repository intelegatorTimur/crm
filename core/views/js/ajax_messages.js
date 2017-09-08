var data_attr = 0;


$('.messages_users a').on('click',function(e){
    e.preventDefault();
    data_attr = $(this).attr('data-attr');
    get_mess(data_attr);
});


function get_mess(data_attr){
    
    
    
    $(this).addClass('user_active');


    $.ajax({
        url:'http://'+window.location.host+'/ajax/messages.php',
        type:'post',
        data:'target=getmess&id='+data_attr,
        success: function(data){

            if(data != 0){
                var send = '';
                var json = JSON.parse(data);
                var member = json[0].messages_from;

                $.each(json,function(k,v){
                    console.log(member + '----'+v.messages_from);

                    if(member === v.messages_from) {

                        send += "<div style='background:silver; width: 300px; padding: 10px; margin-bottom: 15px; position:relative; margin-top: 15px;'>"+v.messages_text+"<div class='mess_name'>("+v.messages_time+" ) "+v.chief_name+"</div></div>";
                    } else {

                        send += "<div style='background:yellow; width:300px; padding: 10px; margin-bottom: 15px; float:right; position:relative; margin-top: 15px;'>"+v.messages_text+"<div class='mess_name'>("+v.messages_time+" ) " +v.chief_name+"</div></div>";   
                    }




                });


                $('.messages_content').html(send);
            }
        }

    });
}

    
   



$('.messages_input button').on('click',function(){
    
   var area =  $('.messages_input textarea').val();
   
    if(area.length > 0){
        $.ajax({
            url: 'http://'+window.location.host+'/ajax/messages.php',
            type: 'post',
            data: 'send='+area+'&data_attr='+data_attr,
            success: function(data){
                
                if(data > 0){
                    
                    get_mess(data_attr);
                    $('.messages_input textarea').val('');
                    var count_height = 0;
                    $('.messages_content > div').each(function() {
                        var h = $(this).height();
                        h = h+30;
                        count_height += h;
                    });
             
                    
                    
                    $('.messages_content').scrollTop(count_height+100);
                    
                }
                
            }
        });
    }
    
});
