<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('_inc/sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-sm-6 col-12">

            </div>
            <div class="col-sm-3">
                <?php if($user): ?>

                <?php else: ?>
                    <div class="card pad-10" style="margin-bottom:15px;">
                        <p>Login to view balance</p>
                        <button class="btn btn-primary">Login now</button>
                    </div>
                <?php endif; ?>
                <div class="card pad-10">
                    <p class="text-center"><b>Latest Scores</b></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_inc/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>