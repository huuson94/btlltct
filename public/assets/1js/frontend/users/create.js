$(document).ready(function(){
    //validate input here
    $("div.signup-form form input.submit").click(function(e){
       var form = $(this).closest('form');
       var error = "";
       if(form.find('input.password').val() != form.find('input.re-password').val()){
           e.preventDefault();
           error += "Password not match";
       }
       var reg = /^\w+@\w+.[\w.]*/
       if(!reg.test(form.find("input.email").val())){
           e.preventDefault();
           error+="Email not valid";
       }
       $("div.error-content").html(error);
    });
    
    
    
    $("input.single").fileinput({
            'showUpload': false,
            'showRemove': false,
    });
});
