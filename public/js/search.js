$(function(){
    var search = $('#search-btn');
    
    search.on('click', function () {
        let keyword = $('#keyword').val();
        let company = $('#company').val();  
        console.log(keyword);
        console.log(company);
        $.ajax({
                url: '/product/search',  //routeの記述
                type: 'GET', //受け取り方法の記述
                data: {
                    'keyword': keyword, //コントローラーに渡すパラメーター
                    'company':company,  
                },
                dataType:'json',
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
                console.log(data);
    
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (jqXHR, textStatus,errorThrown) {
                console.log('エラー');
                console.log(jqXHR.status);
                console.log(textStatus);
                console.log(errorThrown.message);
            });
        
           return false;
    });
});