$(document).ready(function(){
    $('#btnConsumir').click(consumirWs);
    //metodo para consumir el ws de deportenis
    function consumirWs() {
    
        var data = {
            valor: 1,
        }
        
        $.ajax({
            type: 'POST',
            url: '../controller/controlador.php',
            dataType: 'json',
            data: data,
            success: function (res) {
                if(res.success) {
                    alert(res.mensaje);
                    console.log(res.data);
                    console.log(res);
                }else {
                    if(res.error){
                        alert(res.mensaje);
                    }
                } 
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
 });
