<?php $__env->startSection('title','検索結果'); ?>
<?php $__env->startSection('content'); ?>
<h1>検索結果</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><img src="<?php echo e(asset('storage/image/' . $product->img_path)); ?>"></td>
            <td><?php echo e($product->product_name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->stock); ?></td>
            <td><?php echo e($product->company_name); ?></td>
            <td>
                <a href="<?php echo e($product->id); ?>">
                    <button type="submit">詳細</button>
                </a>
            </td>
            <td>
                <form action="<?php echo e(route('delete', ['id'=>$product->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\management-system\resources\views/search.blade.php ENDPATH**/ ?>