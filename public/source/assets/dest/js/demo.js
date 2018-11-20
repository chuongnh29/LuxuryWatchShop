function addToCart(id) {
    console.log(id);
    var data1 = {};
    $.ajax({
       url:"add-to-cart/"+id,
       data:data1,
        dataType:"json",
        type:"GET",
        success :function (result) {
            console.log(result);
        },
        error : function (result) {
            console.log(result);
        }
    });
}