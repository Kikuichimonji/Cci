let play = true;
let scoreList = [];
let timeList = [];

buttonPopup = document.getElementsByTagName("button")[1]
buttonPopup.style.cssText= `background-color: black;
                            color: white;
                            position: absolute;
                            bottom: 0;`
popup = document.getElementById("popup")
popup.style.cssText = `background-color: black;
                        color: white;
                        position: absolute;
                        bottom: 0;
                        width: 100%;
                        height: 100px;
                        padding-left:1em;
                        z-index:0;`


document.getElementsByTagName("body")[0].style.margin = "0"
document.getElementsByTagName("body")[0].style.overflow = "hidden"
xClose = popup.getElementsByTagName("span")[0]
xClose.style.cssText = `position: absolute;
                        bottom: 80px;
                        right: 20px;
                        cursor: pointer`


xClose.addEventListener("click",function(){
    popup.classList.toggle("hidden");
})
buttonPopup.addEventListener("click",function(){
    popup.classList.toggle("hidden");
})

document.getElementsByTagName("button")[0].addEventListener("click",function(){
    let nbEssai = 0;
    let nbToFind = Math.floor(Math.random()*10000);
    console.log(nbToFind);
    play = true;
    playerName = prompt("Veuillez entrer votre nom","Moi");
    let timeStart = Date.now();
    while(play)
    {
        nbEssai++;
        userNb = prompt("Veuillez choisir un nombre",nbToFind)
        if(userNb == nbToFind)
        {
            let timePlayed =Math.floor((Date.now() - timeStart)/1000)
            play = false;
            document.getElementById("score").innerHTML += "<p> Victoire de "+playerName+" en <span class='essaiScore'>"+ nbEssai +"</span> essais. Nombre à trouver: "+ nbToFind +". Temps passé:<span class='essaiTemps'> "+ timePlayed +"</span> secondes</p>";
            
            scoreListLast = document.querySelectorAll("#score p")
            index = scoreListLast.length-1

            for(count = 0;count < scoreListLast.length; count++)
            {
                attachEvents(scoreListLast[count]);
            }

            scoreList.push(nbEssai);
            timeList.push(timePlayed);
            nbEssai = 0; 
            scores = document.querySelectorAll("#scoreResume span")
            scores[0].textContent = avg(scoreList);
            scores[1].textContent = avg(timeList);
            let scoreListDom = document.getElementsByClassName("essaiScore");
            let timeListDom = document.getElementsByClassName("essaiTemps");
            colorScores(scoreListDom);
            colorScores(timeListDom);
        }
    }
})



function attachEvents(el)
{
    el.addEventListener("mouseover",function(){
        el.style.backgroundColor = "orange" 
    })
    el.addEventListener("mouseout",function(){
        el.style.backgroundColor = ""
    })
}
function avg(tab){
    let moy = 0;
    tab.forEach(score =>{   
        moy += score;
    });
    return moy/tab.length;
}
function smallest(coll){
    let smallestNum = coll[0].innerHTML;

    for(count = 0;count < coll.length; count++)
    {
        if(coll[count].textContent < smallestNum)
            smallestNum = coll[count].textContent;
    }
    return parseInt(smallestNum);
}
function highest(coll){
    let highestNum = coll[0].innerHTML;
    for(count = 0;count < coll.length; count++)
    {
        if(coll[count].textContent > highestNum)
            highestNum = coll[count].textContent;
    }
    return parseInt(highestNum);
}

function colorScores(coll){
    smallScore = smallest(coll);
    highScore = highest(coll);

    for(count = 0;count < coll.length; count++)
    {
        if(coll[count].textContent == smallScore || coll[count].textContent == highScore)
        {
            if(coll[count].textContent == smallScore)
            {
                coll[count].style.backgroundColor = "green"
            }
            else
                coll[count].style.backgroundColor = "red"
            coll[count].style.color = "white"
        }
        else
        {
            coll[count].style.backgroundColor = "initial"
            coll[count].style.color = "black"
        }
    }
}