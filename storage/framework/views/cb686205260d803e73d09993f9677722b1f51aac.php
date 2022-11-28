<?php $__env->startSection('title','詳細表示'); ?>
<?php $__env->startSection('content'); ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><img src="<?php echo e(asset('image/' . $product->img_path)); ?>" alt="<?php echo e($product->img_path); ?>"></td>
            <td><?php echo e($product->product_name); ?></td>
            <td><?php echo e($product->company_name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->stock); ?></td>
            <td><?php echo e($product->comment); ?></td>
            <td>
                <button type="submit" onclick="location.href='edit/<?php echo e($product->id); ?>'">編集</button>
                <a href="product">
                    <input type="button" value="戻る">
                </a>
            </td>
        </tr>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\management-system\resources\views/product/detail.blade.php ENDPATH**/ ?>