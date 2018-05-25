<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('_inc/sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-sm-4 col-12">
                <?php if(count($pending) !== 0): ?>
                    <?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-img-top post-image" style="height:10px; background-color: <?php echo e(rand_color()); ?>"></div>
                            <div class="card-body">
                                <a href="javascript:;" class="no-decoration post-title pendingTitle">
                                    <h5 class="card-title"><?php echo e(ucfirst($post->title)); ?></h5>
                                </a>
                                <p class="card-text pending" data-markdown="<?php echo e($post->body); ?>"></p>
                                <?php $__currentLoopData = $post->tags_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-<?php echo e(rand_class($key)); ?>"><?php echo e($tag); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <br><br>
                                <small class="card-text"><a target="_blank" href="<?php echo e(site_url().'profile/@'.$post->steem_username); ?>" class="text-primary"><?php echo e($post->steem_username); ?></a> (<?php echo e(timeAgo($post->created_at)); ?>)</small>
                            </div>
                            <template>
                                <h5><?php echo e($post->title); ?></h5>
                                <div class="m-b-20">
                                    <?php $__currentLoopData = $post->tags_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-<?php echo e(rand_class($key)); ?>"><?php echo e($tag); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-3 z-r-p">
                                        <img class="profile-dp-s" src="<?php echo e('https://steemitimages.com/u/'.$post->steem_username.'/avatar/small'); ?>" onerror="this.src='<?php echo e(base_url().'img/user.png'); ?>'"/>
                                    </div>
                                    <div class="col-sm-8 col-9 z-l-p">
                                        <a target="_blank" href="<?php echo e(site_url().'profile/@'.$post->steem_username); ?>" class="no-decoration post-title">
                                            <h5 id="author" class="z-m-b post-title"><?php echo e($post->steem_username); ?></h5>
                                        </a>
                                        <p class="text-muted text-15">Posted <?php echo e(timeAgo($post->created_at)); ?></p>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <hr>
                                <div data-author="<?php echo e($post->steem_username); ?>" data-id="<?php echo e($post->id); ?>" data-assurance="<?php echo e($post->posting_key); ?>" class="w-100 post-viewer-p markdownHTML" data-tags="<?php echo e($post->tags); ?>" data-title="<?php echo e($post->title); ?>" data-markdown="<?php echo e($post->body); ?>"></div>
                            </template>
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
            <div class="col-sm-5">
                <div id="pendingBody" class="card pad-20 post-viewer post-viewer-p"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_inc/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>