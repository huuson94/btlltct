$(document).ready(function(){
   $('.delete-btn').click(function(e){
       if(!confirm('Bạn có chắc chắn xóa')){
           e.preventDefault();
           return false;
       }
   });
});