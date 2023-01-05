$(".set-quantity").on("click", ".minus", function(){
    var qt = document.getElementById("qnt3");
    if(qt.value > 1){
       qt.value--;
    }
})
$(".set-quantity").on("click", ".plus", function(){
    var qt = document.getElementById("qnt3");
    if(qt.value < 5){
        qt.value++;
    }
})
$(".add-to-cart-container").on("click", ".add-btn", function(){
    var qt = document.getElementById("qnt3");
    var prod_name = "MSI MAG B660M MORTAR";
    var prod_price = 900;
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