<?php $__env->startSection('title','登録フォーム'); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h2>商品登録フォーム</h2>
    <form action="<?php echo e(route('store')); ?>"
         enctype="multipart/form-data"
         method="POST"
    >
    <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="text" name="product_name" placeholder="商品名を入力">
        </div>
        <div class="form-group">
            <label for="company_name">メーカー名</label>
            <select name="company_name" id="company_name">
                <?php $__currentLoopData = $creates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $create): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($create->company_name); ?>"><?php echo e($create->company_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">価格</label>
            <input type="text" name="price" placeholder="価格を入力">
        </div>
        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="text" name="stock" placeholder="在庫数を入力">
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="image">画像選択</label>
            <input type="file" name="image">
        </div>
        <button type="submit">登録</button>
        <a href="product/"><input type="button" value="戻る"></a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\management-system\resources\views/sign_up.blade.php ENDPATH**/ ?>