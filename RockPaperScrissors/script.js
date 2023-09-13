let winCount = 0;
let drawCount = 0;
let loseCount = 0;

let winText = document.getElementById("win-text");
let drawText = document.getElementById("draw-text");
let loseText = document.getElementById("lose-text");

let rock = document.getElementById("enemyrock");
let paper = document.getElementById("enemypaper")
let scrissors = document.getElementById("enemyscrissors")

function selectRandom(){
    const cars = ["enemyrock", "enemypaper", "enemyscrissors"];
    for(let id of cars){
        document.getElementById(id).style.display = "none";
    }
    return cars[Math.floor(Math.random()*cars.length)];
}

function rockOnClick(){
    let selected = selectRandom();
    document.getElementById(selected).style.display = "flex";

    if(selected == "enemyscrissors"){
        winCount++;
        winText.innerHTML = "Győztes:"+winCount;
    }
    if(selected == "enemyrock"){
        drawCount++;
        drawText.innerHTML = "Döntetlen:"+drawCount;
    }
    if(selected == "enemypaper"){
        loseCount++;
        loseText.innerHTML = "Vesztes:"+loseCount;
    }
    
}

function paperOnClick(){
    let selected = selectRandom();
    document.getElementById(selected).style.display = "flex";

    if(selected == "enemyrock"){
        winCount++;
        winText.innerHTML = "Győztes:"+winCount;
    }
    if(selected == "enemypaper"){
        drawCount++;
        drawText.innerHTML = "Döntetlen:"+drawCount;
    }
    if(selected == "enemyscrissors"){
        loseCount++;
        loseText.innerHTML = "Vesztes:"+loseCount;
    }
    
}
function scrissorsOnClick(){
    let selected = selectRandom();
    document.getElementById(selected).style.display = "flex";

    if(selected == "enemypaper"){
        winCount++;
        winText.innerHTML = "Győztes:"+winCount;
    }
    if(selected == "enemyscrissors"){
        drawCount++;
        drawText.innerHTML = "Döntetlen:"+drawCount;
    }
    if(selected == "enemyrock"){
        loseCount++;
        loseText.innerHTML = "Vesztes:"+loseCount;
    }
    
}

function restart(){
    winCount = 0;
    drawCount = 0;
    loseCount = 0;  
    selectRandom();
    winText.innerHTML = "Győztes:"+winCount;
    drawText.innerHTML = "Döntetlen:"+drawCount;
    loseText.innerHTML = "Vesztes:"+loseCount;

}