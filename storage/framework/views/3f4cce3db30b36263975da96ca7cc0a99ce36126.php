<?php if($comments): ?>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-sm-1 col-2">
                <img class="profile-dp-s" src="<?php echo e('https://steemitimages.com/u/'.$comment['author'].'/avatar/small'); ?>" onerror="this.src='<?php echo e(base_url().'img/user.png'); ?>'"/>
            </div>
            <div class="col-sm-11 col-10">
                <a href="<?php echo e(site_url().'profile/@'.$comment['author']); ?>" class="no-decoration post-title">
                    <p class="card-title"><strong><?php echo e($comment['author']); ?></strong> <small class="text-muted pull-right"><?php echo e(timeAgo($comment['created'])); ?></small></p>
                </a>
                
                <div class="commentMarkdown" data-markdown="<?php echo e($comment['body']); ?>"></div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <p class="text-muted font-italic"><i class="pe-7s-chat text-20"></i> No comment on this post yet</p>
        </div>
        <div class="col-sm-3"></div>
    </div>
<?php endif; ?>