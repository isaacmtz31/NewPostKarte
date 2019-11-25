$(document).ready(function(){
    $("#formLoginV3m").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(evnt){
            evnt.preventDefault();
            var tipoAlerts = new Array("red","blue");
            var iconos = new Array("fas fa-exclamation","fas fa-check fa-2x");
            $.ajax({
                method:"POST",
                url:"./../pages/index_AX.php",
                data:$("#formLoginV3m").serialize(),
                cache:false,
                success:function(respAX){
                    console.log(respAX);
                    var AX = JSON.parse(respAX);
                    $.alert({
                        title:"PostKarte",
                        content: AX.msj,
                        icon:iconos[AX.val],
                        type:tipoAlerts[AX.val],
                        onDestroy:function(){
                            if(AX.val == 1){
                                window.location.replace("./../pages/profile.php");
                            }
                        }
                    });
                }
            });
        }
    });
});
