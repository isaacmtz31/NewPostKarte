var globalData = "";

$(document).ready(function() {
    $("#busqueda a").click(function() {
        var val = $(this).data('value') // would be 5
        //swal("Ok!", "Buscando imagenes de la categoria ".concat(val) , "success");
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {"test" : val},
            url: './../pages/explorarPersonalizada_AX.php',
            success: function(data) {
              globalData = data;
              swal("Genial", "Nuevos recursos encontrados", "success");
              document.getElementById("yy").innerHTML = "";
              document.getElementById("xx").innerHTML = data;
              var mi = document.getElementsByTagName('footer')[0];
              var script= document.createElement('script');
              script.src= './../js/gridPrueba.js';
              mi.appendChild(script);

            }
          });
    });
});
