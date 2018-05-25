<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-m">

            </div>
            <div class="col-sm-6 col-12">
                <?php if(count($pending) !== 0): ?>
                    <?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-img-top post-image" style="height:10px; background-color: <?php echo e(rand_color()); ?>"></div>
                            <div class="card-body">
                                <a href="" class="no-decoration post-title">
                                    <h5 class="card-title"><?php echo e(ucfirst($post->title)); ?></h5>
                                </a>
                                <p class="card-text pending" data-markdown="<?php echo e($post->body); ?>"></p>
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-<?php echo e(rand_class($key)); ?>"><?php echo e($tag); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br><br>
                                <small class="card-text">Status: <span class="text-warning">Awaiting approval</span></small>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="card text-center">
                        <div class="pad-20">
                            <img src="https://png.icons8.com/cotton/80/000000/mission-of-a-company.png">
                            <p class="mb-0 text-muted">You have no post pending approval</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-3 hidden-m">

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_inc/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>