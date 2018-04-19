function selectCard(cardNum){
    var des = document.getElementsByClassName("card-select");
    var currSel = document.getElementById("data-cardSelect"+cardNum);
    for (var i = 0; i < des.length; i++){
        if (des[i].classList.contains("is-selected") && des[i] != currSel){
            des[i].classList.remove("is-selected");
        }
    }
    currSel.classList.toggle("is-selected");
    var type = ""
    if (currSel.classList.contains("is-selected")){
        type=currSel.getAttribute("data-value");
    }
    document.getElementById("type").value=type;
    document.getElementById("selectType").setAttribute("style","display: none");
    document.getElementById("emailpassword").setAttribute("style","display: block");
    document.getElementById("whoareyou").innerHTML = "Welcome aboard!";
    //document.getElement()
};
