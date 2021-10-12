var span = document.getElementsByClassName("random");
var rD = Math.floor(Math.random() *(1000-0 +1));
var rH = Math.floor(Math.random() *(23-0 +1));

var rM = Math.floor(Math.random() *(59-0 +1));
var rS = Math.floor(Math.random() *(59-0 +1));
var tabR = [rD,rH,rM,rS];



function random(){
     rD = Math.floor(Math.random() *(1000-0 +1));
     rH = Math.floor(Math.random() *(23-0 +1));
     rM = Math.floor(Math.random() *(59-0 +1));
     rS = Math.floor(Math.random() *(59-0 +1));
    tabR = [rD,rH,rM,rS];
    for(let count = 0; count<4; count++)
    {
        span[count].innerHTML = tabR[count];
    }
}

function decompte()
{
    
    rS--;
    if(rS <0)
    {
        rS = 59;
        rM--;
        if(rM <0)
        {
            rM=59;
            rH--;
            if(rH <0)
            {
                rH=23;
                if(rD <0)
                    rD--;
            }
            
        }
    }
    
    rM= Number(rM);
    rH = Number(rH);
    if(rS <10)
        rS= "0"+rS;
    if(rM <10)
        rM = "0"+rM;
    if(rH <10)
        rH = "0"+rH;

    
    
    tabR = [rD,rH,rM,rS];
    for(let count = 0; count<4; count++)
    {
        span[count].innerHTML = tabR[count];
    }
}

//random();
setInterval(decompte,10);