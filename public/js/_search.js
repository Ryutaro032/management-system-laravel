$(function(){
    var search = $('#search-btn');
    
    search.on('click', function () {
        var keyword = $('#keyword').val();
        var company = $('#company').val();
        var price_upper = $('#price_upper').val();
        var price_lower = $('#price_lower').val();
        var stock_upper = $('#stock_upper').val();
        var stock_lower = $('#stock_lower').val();
        
        console.log(keyword);
        console.log(company);
        console.log(price_upper);
        console.log(price_lower);
        console.log(stock_upper);
        console.log(stock_lower);
        
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
                url: "http://localhost/management-system/public/product/search",
                type: "get",
                data: {
                    "keyword" : keyword,
                    "company" : company,
                    "price_upper": price_upper,
                    "price_lower": price_lower,
                    "stock_upper": stock_upper,
                    "stock_lower": stock_lower,
                },
                dataType:"text",
        })
            .done(function (data) {
                console.log(data);
                $('#app').html(data);
            })
            .fail(function (jqXHR, textStatus,errorThrown) {
                console.log(jqXHR.status);
                console.log(textStatus);
                console.log(errorThrown.message);
            });
           return false;
    });
});