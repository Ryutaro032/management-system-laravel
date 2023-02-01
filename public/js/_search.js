$(function(){
    var search = $('#search-btn');
    
    search.on('click', function () {
        var keyword = $('#keyword').val();
        var company = $('#company').val();  
        console.log(keyword);
        console.log(company);
        if (!keyword && !company) {
            return false;
        } //ガード節で検索ワードが空の時、ここで処理を止めて何もビューに出さない
        
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
                url: '/product/search',  //routeの記述
                type: 'POST', //受け取り方法の記述
                data: {
                    'keyword' : keyword, //コントローラーに渡すパラメーター
                    'company' : company,  
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