function valdiation_login()
{
    if(document.login_form.username.value=="")
        {
           alert('Enter User Name'); 
            return false;
        }
         if(document.login_form.password.value=="")
        {
           alert('Enter Password'); 
            return false;
        }
       
        
    
}

$('document').ready(function() {  
    $('.keyup-numeric2').keyup(function() {
        $('span.error-keyup-1').hide();
        var inputVal = $(this).val();
        var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
        if (!numericReg.test(inputVal)) {
            $(this).val($(this).val().slice(0, -1));
        //$(this).after('<span class="error error-keyup-1">Numeric characters only.</span>');
        }
    });
});
