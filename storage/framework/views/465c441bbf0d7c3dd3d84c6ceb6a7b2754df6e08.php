<?php $__env->startSection('title','一覧画面'); ?>
<?php $__env->startSection('sign_up'); ?>
<div class="top-right links">
    <a href="<?php echo e(route('create')); ?>">商品登録</a>
    <?php if(Route::has('login')): ?>
                <div class="top-right links">
                <?php echo $__env->yieldContent('sign_up'); ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('search'); ?>
<form action="<?php echo e(route('search')); ?>" method="get">
    <?php echo csrf_field(); ?>
    <input 
        type="text" 
        name="keyword" 
        placeholder="キーワードを入力"
        value="<?php if(isset( $keyword1 )): ?> <?php echo e($keyword1); ?><?php endif; ?>"
    >
    <select name="company_name" id="company_name">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($product->company_name); ?>"><?php echo e($product->company_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit">検索</button>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('err_msg')): ?>
    <p>
        <?php echo e(session('err_msg')); ?>

    </p>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th hidden>ID</th>
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
            <td hidden><?php echo e($product->id); ?></td>
            <td><img src="<?php echo e(asset('storage/image/' . $product->img_path)); ?>"></td>
            <td><?php echo e($product->product_name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->stock); ?></td>
            <td><?php echo e($product->company_name); ?></td>
            <td>
                <a href="product/<?php echo e($product->id); ?>">
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\management-system\resources\views/list.blade.php ENDPATH**/ ?>