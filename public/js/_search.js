$(function(){
    var search = $('#search-btn');
    
    search.on('click', function () {
        var keyword = $('#keyword').val();
        var company = $('#company').val();
        
        console.log(keyword);
        console.log(company);
        
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
                url: "http://localhost/management-system/public/product/search",
                type: "get",
                data: {
                    "keyword" : keyword,
                    "company" : company,
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