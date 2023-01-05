$(".set-quantity").on("click", ".minus", function(){
    var qt = document.getElementById("qt2");
    if(qt.value > 1){
       qt.value--;
    }
})
$(".set-quantity").on("click", ".plus", function(){
    var qt = document.getElementById("qt2");
    if(qt.value < 5){
        qt.value++;
    }
})
$(".add-to-cart-container").on("click", ".add-btn", function(){
    var qt = document.getElementById("qt2");
    var prod_name = "Ryzen9-3950X";
    var prod_price = 4500;
    $.ajax({
        url: "../.././handlecart.php",
        method: "POST",
        dataType: "json", 
        data: {
            "prod_name": prod_name,
            "prod_qt": qt.value,
            "prod_price": prod_price,
            "scope": "add"
        },
        success: function(data){
           console.log(data);            
        }   
    }); 
})