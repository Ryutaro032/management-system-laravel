$(function() {
    $(document).on('click','#delete_btn', function() {
        var deleteConfirm = confirm('削除してよろしいでしょうか？');

        if(deleteConfirm == true) {
            var clickEle = $(this);
            
            // 削除ボタンにユーザーIDをカスタムデータとして埋め込んでます。
            var productID = clickEle.data('product_id');
    
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            url: "product/delete/"+productID,
            type: 'POST',
            data: {"product_id": productID,
                    },
            })
    
        .done(function() {
            console.log('clicked');
            clickEle.parents('tr').hide();
            })
        .fail(function() {
            alert('エラー');
            });
        }
    });
  });