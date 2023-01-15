$(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})
$(document).ready(function () {
    $("#pwd, #cpwd").on("keyup", function () {
      
      var PasswordValue = $("#pwd").val();
      var confirmPasswordValue = $("#cpwd").val();
  
  
      if (PasswordValue.length > 0 && confirmPasswordValue.length > 0) {
        if (confirmPasswordValue !== PasswordValue) {
          $("#pswdm").removeAttr("hidden");
          $("#submit").attr("disabled", true);
          document.getElementById("pwd").style.borderColor = 'red';
          document.getElementById("cpwd").style.borderColor = 'red';

        }
        if (confirmPasswordValue === PasswordValue) {
          $("#submit").removeAttr("disabled");
          $("#pswdm").attr("hidden", true);
          document.getElementById("pwd").style.borderColor = '#C4C4C4';
          document.getElementById("cpwd").style.borderColor = '#C4C4C4';
        }
      }
    });});