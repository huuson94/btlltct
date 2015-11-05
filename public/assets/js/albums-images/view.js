$(document).ready(function(){
   $("button.follow-btn").click(function(){
       var obj = $(this);
       $.ajax({
          url: obj.attr('itemid'),
          type: 'POST',
          dataType: 'html',
          data: {
              user_id: $("#user_id").val(),
              current_user: $("#current_user").val()
          },
          success: function(result){
              if(result == 'true'){
                  obj.hide();
                  $("button.unfollow-btn").show();
              }
          }
       });
   }); 
   $("button.unfollow-btn").click(function(){
       var obj = $(this);
       $.ajax({
          url: obj.attr('itemid'),
          type: 'POST',
          dataType: 'html',
          data: {
              user_id: $("#user_id").val(),
              current_user: $("#current_user").val()
          },
          success: function(result){
              if(result == 'true'){
                  obj.hide();
                  $("button.follow-btn").show();
              }
          }
       });
   }); 
});