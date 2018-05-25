<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 col-12">
                <div class="card pad-20">
                    <h2 class="text-center">Welcome Back</h2>
                    <?php if(isset($message)): ?>
                        <div class="alert alert-<?php echo e($message['type']); ?>" role="alert">
                            <?php echo e($message['body']); ?>

                        </div>
                    <?php else: ?>
                        <br>
                    <?php endif; ?>
                    <form action="<?php echo e(site_url().'login'); ?>" method="post">
                        <div class="form-group">
                            <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="input-group mb-3">
                            <input required name="password" type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-show" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <a href="#">Forgot password? click here</a><br><br>
                        <button type="submit" class="btn btn-success">Login</button>
                        <a class="btn btn-default" href="<?php echo e(site_url().'signup'); ?>">Sign up instead</a>
                        <?php echo e(csrf_field()); ?>

                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_inc/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>