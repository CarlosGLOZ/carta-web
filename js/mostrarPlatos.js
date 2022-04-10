function hideDishes() {
    for (let i = 0; i < document.getElementsByClassName("dish-info").length; i++) {
        document.getElementsByClassName("dish-info")[i].style.width = "0";
        document.getElementsByClassName("dish-img-background")[i].style.width = "0";
        document.getElementsByClassName("dish-img")[i].style.width = "0";
        document.getElementsByClassName("dish-img")[i].style.display = "none";
        document.getElementsByClassName("close-x")[i].style.display = "none";
    }

    console.log("DISHES HIDDEN!!")
}

function openDish(dish) {
    hideDishes();

    console.log("DISH OPENED!! - " + dish);

    document.getElementById(dish).style.width = "35%";
    document.getElementById("img-" + dish).style.width = "35%";
    document.getElementById("img-" + dish + "-foto").style.display = "block";
    document.getElementById("img-" + dish + "-foto").style.width = "400px";
    document.getElementById("img-" + dish + "-foto").style.height = "266px";
    document.getElementById("close-x-" + dish).style.display = "block";
}

function showDesc(caracteristica) {
    document.getElementById(caracteristica).style.display = "block";
}

// window.onload = hideDishes;