$(document).ready(function(){
        $("#formRegistro").validetta({
            bubblePosition: 'bottom',
            bubbleGapTop: 10,
            bubbleGapLeft: -5,
            onValid:function(e){
                e.preventDefault();
                var tipo = new Array("red","green");
                $.ajax({
                    method:"POST",
                    url:"./crearCuenta_AX.php",
                    data:new FormData($("#formRegistro")[0]),
                    contentType: false,
                    processData:false,
                    cache:false,
                    success:function(respAX){
                        var AX = JSON.parse(respAX);
                        $.alert({
                            title:"<h4>PostKarte",
                            icon:"fas fa-info fa-2x",
                            content:AX.msj,
                            type:tipo[AX.val],
                            onDestroy:function(){
                                if(AX.val == 1){
                                    window.location.replace("./../index.html");
                                }
                            }
                        });
                    }
                });
            }
        });
    });