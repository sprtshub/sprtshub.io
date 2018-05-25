<div class="col-sm-3 hidden-m">
    <div class="card pad-10 anchor">
        <a class="sidebar-a" href="<?php echo e(site_url()); ?>">
            <div class="seg <?php if($page == 'home'): ?> active <?php endif; ?>">
                <i class="pe-7s-pen text-success text-20"></i>
                <p>Posts</p>
            </div>
        </a>
        <a class="sidebar-a" href="<?php echo e(site_url().'predictions'); ?>">
            <div class="seg <?php if($page == 'prediction'): ?> active <?php endif; ?>">
                <i class="pe-7s-magic-wand text-success text-20"></i>
                <p>Predictions</p>
            </div>
        </a>
        <a class="sidebar-a" href="<?php echo e(site_url()); ?>">
            <div class="seg">
                <i class="pe-7s-flag text-success text-20"></i>
                <p>Guidelines (under dev)</p>
            </div>
        </a>
        <a class="sidebar-a" href="<?php echo e(site_url()); ?>">
            <div class="seg">
                <i class="pe-7s-help2 text-success text-20"></i>
                <p>Help (under dev)</p>
            </div>
        </a>
    </div>
    <?php if($user && $user->clearance == 1): ?>
        <div class="card pad-10 anchor" style="margin-top:230px;">
            <p class="text-center"><b>Admin Control</b></p>
            <a class="sidebar-a" href="<?php echo e(site_url().'admin/pending'); ?>">
                <div class="seg <?php if($page == 'admin_pending'): ?> active <?php endif; ?>">
                    <i class="pe-7s-look text-danger text-20"></i>
                    <p>Unapproved posts</p>
                </div>
            </a>
            <a class="sidebar-a" href="<?php echo e(site_url().'predictions'); ?>">
                <div class="seg">
                    <i class="pe-7s-magic-wand text-danger text-20"></i>
                    <p>All Predictions</p>
                </div>
            </a>
        </div>
    <?php endif; ?>
</div>