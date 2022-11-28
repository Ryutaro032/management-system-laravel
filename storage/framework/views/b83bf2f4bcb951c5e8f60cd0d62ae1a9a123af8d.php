<?php $__env->startSection('title','編集画面'); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h2>商品編集フォーム</h2>
    <form action="<?php echo e(route('update', $product->id)); ?>" enctype="multipart/form-data" method="post">
    <?php echo csrf_field(); ?>
    <div>
        <label for="">商品画像</label>
            <div>
                <input type="file" name="img_path">
            </div>
            <img src="<?php echo e(asset('storage/image/' . $product->img_path)); ?>" alt="$product->img_path" width="25%">
    </div>
    <div>
        <label for="">商品名</label>
        <input 
            id="product_name"
            name="product_name"
            value="<?php echo e(old('product_name') ?:$product->product_name); ?>"
            type="text"
        >
    </div>
    <div>
        <select name="company_name" id="company_name">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e(old('company_name') ?:$product->company_name); ?>"><?php echo e($product->company_name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select>
    </div>
    <div>
        <label for="">価格</label>
        <input 
            id="price"
            name="price"
            value="<?php echo e(old('price') ?:$product->price); ?>"
            type="text"
        >
    </div>
    <div>
    <label for="">在庫数</label>
        <input 
            id="stock"
            name="stock"
            value="<?php echo e(old('stock') ?:$product->stock); ?>"
            type="text"
        >
    </div>
    <div>
    <label for="">コメント</label>
        <textarea 
            name="comment" 
            id="comment" 
            cols="40" 
            rows="5"
            value="<?php echo e(old('comment') ?:$product->comment); ?>"
        >

        </textarea>
    </div>
    <div>
        <button type="submit">更新する</button>
            <a href="<?php echo e(route('detail', $product->id)); ?>">
                <input type="button" value="戻る">
            </a>
    </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\management-system\resources\views/edit.blade.php ENDPATH**/ ?>