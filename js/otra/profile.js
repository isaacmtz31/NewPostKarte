$(function() {

  $('#check').on("change", function() {
    var ena = document.getElementById("email").disabled;
    if(ena)
    {
      document.getElementById("email").disabled = false;
    }else {
      document.getElementById("email").disabled = true;      
    }

  });
});
