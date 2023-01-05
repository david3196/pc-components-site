const menu = document.getElementById("menu");
const hamburger = document.getElementById("hamburger-menu");
const subMenu1 = document.getElementById("sub-op1");


$(".navbar-menu").on("click", "#navbar-hamburger", function(){
    if(menu.style.left == "-350px")
        {menu.style.left = "0px";
        hamburger.style.opacity = "0.5";
    }
    else
        {menu.style.left = "-350px";
        hamburger.style.opacity = "1";}
})


$(".menu-options").on("click", "#menu-btn1", function(){
    console.log("!!");
    if(subMenu1.style.display == "none")
        subMenu1.style.display = "grid";
    else
        subMenu1.style.display = "none";
})