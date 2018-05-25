<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="pad-20">
                        <h3><?php echo e($postData->title); ?></h3>
                        <div class="m-b-20">
                            <?php $__currentLoopData = $postData->json_metadata->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge badge-<?php echo e(rand_class($key)); ?>"><?php echo e($tag); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-3 z-r-p">
                                <img class="profile-dp" src="<?php echo e('https://steemitimages.com/u/'.$postData->author.'/avatar/small'); ?>" onerror="this.src='<?php echo e(base_url().'img/user.png'); ?>'"/>
                            </div>
                            <div class="col-sm-8 col-9 z-l-p">
                                <div class="user-info">
                                    <a href="<?php echo e(site_url().'profile/@'.$postData->author); ?>" class="no-decoration post-title">
                                        <h5 id="author" class="z-m-b post-title card-title"><?php echo e($postData->author); ?></h5>
                                    </a>
                                    <p id="permlink" hidden><?php echo e($postData->permlink); ?></p>
                                    <p class="text-muted text-15">Posted <?php echo e(timeAgo($postData->created)); ?></p>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <hr>
                        <div class="w-100 post-viewer markdownHTML" data-markdown="<?php echo e($postData->body); ?>"></div>
                        <hr>
                        <div>
                            <p class="text-muted"><i class="fa fa-clock-o"></i> Posted <?php echo e(timeAgo($postData->created)); ?></p>
                            <p class="card-text">
                                <?php if(!isset($user->email)): ?>
                                    <a href="<?php echo e(site_url().'login'); ?>" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration action-btn">
                                        <i class="pe-7s-like2"></i> <?php echo e($postData->net_votes); ?>

                                    </a>
                                <?php else: ?>
                                    <?php if(in_array($user->steem_username, $voters)): ?>
                                        <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration upvoted action-btn">
                                            <img src="<?php echo e(base_url().'img/loading.gif'); ?>" class="hide" style="max-height: 100%;"/>
                                            <span><i class="pe-7s-like2"></i> <?php echo e($postData->net_votes); ?></span>
                                        </a>
                                    <?php else: ?>
                                        <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration up-vote action-btn" data-key="<?php echo e($user->posting_key); ?>" data-author="<?php echo e($postData->author); ?>" data-permlink="<?php echo e($postData->permlink); ?>" data-user="<?php echo e($user->steem_username); ?>">
                                            <img src="<?php echo e(base_url().'img/loading.gif'); ?>" class="hide" style="max-height: 100%;"/>
                                            <span><i class="pe-7s-like2"></i> <?php echo e($postData->net_votes); ?></span>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <a class="btn btn-outline-light no-decoration font-weight-bold text-primary action-btn" href="#">
                                    <i class="pe-7s-comment"></i> <?php echo e($postData->children); ?>

                                </a>
                                <span class="font-weight-bold text-muted text-15 pull-right payout">$<?php echo e(number_format((float)$postData->pending_payout_value, 2, '.', '')); ?></span>
                            </p>
                            <p class="text-20 font-weight-bold">Comments</p>
                            <div id="commentBody"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('_inc/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_inc/base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>