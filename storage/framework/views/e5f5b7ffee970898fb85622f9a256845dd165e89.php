<?php if($posts): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key == '3'): ?>
            <div class="desktop-remove mb-3">
                <a href="<?php echo e(site_url()); ?>">
                    <img style="width:100%" src="<?php echo e(base_url().'img/prediction.png'); ?>"/>
                </a>
            </div>
        <?php endif; ?>
        <div class="card mb-3">
            <?php if($post['cover'] != '' && isset($post['url'])): ?>
                <a href="<?php echo e(site_url().'post/'.prepareLink($post['url'])); ?>" class="no-decoration post-title">
                    <div class="card-img-top post-image" style="background-image:url(<?php echo e($post['cover']); ?>)"></div>
                </a>
            <?php else: ?>
                <div class="card-img-top post-image" style="height:10px; background-color: <?php echo e(rand_color()); ?>"></div>
            <?php endif; ?>
            <div class="card-body">
                <?php if(isset($post['url'])): ?>
                    <a href="<?php echo e(site_url().'post/'.prepareLink($post['url'])); ?>" class="no-decoration post-title">
                        <h5 class="card-title"><?php echo e(ucfirst($post['title'])); ?></h5>
                    </a>
                <?php endif; ?>
                <p class="card-text"><?php echo e($post['body']); ?>...</p>
                <?php $__currentLoopData = $post['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-<?php echo e(rand_class($key)); ?>"><?php echo e($tag); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="card-text mt-10"><a class="text-15 font-weight-bold" href="<?php echo e(site_url().'profile/@'.$post['author']); ?>">- <?php echo e($post['author']); ?> <small class="text-muted">(<?php echo e(timeAgo($post['created'])); ?>)</small></a></p>
                <p class="card-text">
                    <?php if(!isset($user->email)): ?>
                        <a href="<?php echo e(site_url().'login'); ?>" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration action-btn">
                            <i class="pe-7s-like2"></i> <?php echo e($post['net_votes']); ?>

                        </a>
                    <?php else: ?>
                        <?php if(in_array($user->steem_username, $post['voters'])): ?>
                            <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration upvoted action-btn">
                                <img src="<?php echo e(base_url().'img/loading.gif'); ?>" class="hide" style="max-height: 100%;"/>
                                <span><i class="pe-7s-like2"></i> <?php echo e($post['net_votes']); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration up-vote action-btn" data-key="<?php echo e($user->posting_key); ?>" data-author="<?php echo e($post['author']); ?>" data-permlink="<?php echo e($post['permlink']); ?>" data-user="<?php echo e($user->steem_username); ?>">
                                <img src="<?php echo e(base_url().'img/loading.gif'); ?>" class="hide" style="max-height: 100%;"/>
                                <span><i class="pe-7s-like2"></i> <?php echo e($post['net_votes']); ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a class="btn btn-outline-light no-decoration font-weight-bold text-primary action-btn">
                        <i class="pe-7s-comment"></i> <?php echo e($post['children']); ?>

                    </a>
                    <?php if($post['last_payout'] == '1970-01-01T00:00:00'): ?>
                        <span class="font-weight-bold text-muted text-15 pull-right payout">$<?php echo e(number_format(round((float)$post['pending_payout_value'], 2), 2, '.', '')); ?></span>
                    <?php else: ?>
                        <span class="font-weight-bold text-muted text-15 pull-right payout">$<?php echo e(number_format(round((float)$post['total_payout_value']+(float)$post['curator_payout_value'], 2), 2, '.', '')); ?></span>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="card text-center">
        <div class="pad-20">
            <img src="https://png.icons8.com/ultraviolet/100/000000/news.png">
            <p class="mb-0 text-muted">No feeds to show</p>
        </div>
    </div>
<?php endif; ?>