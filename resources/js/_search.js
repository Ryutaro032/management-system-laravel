$('#search-btn').on('click', function () {
    let keyword = $('#keyword').val;
    let company = $('#company').val;  
    console.log(keyword);
    console.log(company);
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/product/search',  //routeの記述
            type: 'GET', //受け取り方法の記述
            dataType:'json',
            data: {
                'keyword': keyword, //コントローラーに渡すパラメーター
                'company':company
            },
    })

        // Ajaxリクエストが成功した場合
        .done(function (data) {
            console.log(data);


        })
        // Ajaxリクエストが失敗した場合
        .fail(function (xhr, err) {
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
    
    return false;
});