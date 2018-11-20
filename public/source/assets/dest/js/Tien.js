$(document).ready(function () {

    function format_number(val)
    {
        var v = Number(val);
        if (isNaN(v)) { return val; }
        var sign = (v < 0) ? '-' : '';
        var res = Math.abs(v).toString().split('').reverse().join('').replace(/(\d{3}(?!$))/g, '$1,').split('').reverse().join('');
        return sign + res;
    }

    $('.reduced-items').click(function () {
        var regex = /\D/;

        var unitPriceArr = $('.unit-price').html().trim().split(regex);
        var unitPrice = '';
        for (var i = 0; i<unitPriceArr.length; i++){
            unitPrice+=unitPriceArr[i];
        }
        unitPrice = parseInt(unitPrice);
        var qty =  parseInt($('input[name=qty]').val());
        var total = qty * unitPrice;
        total = format_number(total);
        var totalElement = $('.total').html('$ '+total);
        console.log(total);
    });

    $('.increase-items').click(function () {
        var regex = /\D/;

        var unitPriceArr = $('.unit-price').html().trim().split(regex);
        var unitPrice = '';
        for (var i = 0; i<unitPriceArr.length; i++){
            unitPrice+=unitPriceArr[i];
        }
        unitPrice = parseInt(unitPrice);
        var qty =  parseInt($('input[name=qty]').val());
        var total = qty * unitPrice;
        total = format_number(total);
        var totalElement = $('.total').html('$ '+total);
        console.log(total);
    });
});
