
var f=1;
function offbell() {
    if (f==1) {
        animacion = function(){
  
            $("#campana").fadeTo(500, .1)
                            .fadeTo(500, 1);
        }
        setInterval(animacion, 1000);
        f=2;
    }
    if (f==2) {
        $("#campana").fadeTo(0, 0)
                            .fadeTo(0, 0);
    }
    
}