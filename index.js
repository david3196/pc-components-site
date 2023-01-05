let imgIndex = 0;

showPromoImages();
function showPromoImages(){
    let img = document.getElementsByClassName("promo-img");
    for(let i=0; i < img.length; i++){
        img[i].style.display = "none";
    }
     imgIndex++;
     if(imgIndex > img.length)
         imgIndex = 1;
     img[imgIndex-1].style.display = "block";
     setTimeout(showPromoImages, 2000);
// 
}

