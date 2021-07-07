function changeCaughtState (divID) {
    let toggleState = document.getElementById(divID).classList;
    
    switch (toggleState.item(3)) {
        case null:
            toggleState.add("trade");
            break;
        case "trade":
            toggleState.remove("trade");
            toggleState.add("place");
            break;
        case "place":
            toggleState.remove("place");
            toggleState.add("caught");
            break;
        case "caught":
            toggleState.remove("caught");
            break;
    }  
}

function changeDexCaughtState (divID) {
    //document.getElementById("caught-national").innerHTML = "Success"; // This works so we know the function is called correctly
    let dexEntryToggles = divID.getElementsByClassName("dexEntry"); // This isn't working because the dex entries are a few levels down.  Iterate per box?
    for (var i = 0; i < dexEntryToggles.length; i++) {
        dexEntryToggles[i].classList.add("caught");
    }
}

function changeCollapseState (buttonID, divID) {
    if (document.getElementById(buttonID).innerHTML == "Expand") {
        document.getElementById(buttonID).innerHTML = "Collapse";
        document.getElementById(divID).classList.add("show");
    }
    else if (document.getElementById(buttonID).innerHTML == "Collapse") {
        document.getElementById(buttonID).innerHTML = "Expand";
        document.getElementById(divID).classList.remove("show");
    }
}