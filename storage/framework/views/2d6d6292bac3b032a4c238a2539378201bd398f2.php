<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href=<?php echo e(base_url().'img/favicon.png'); ?>>
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url().'css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url().'css/custom.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo e(base_url().'css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(base_url().'css/pe-icon-7-stroke.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo e(base_url().'js/bootstrap.js'); ?>"></script>
    <script src="<?php echo e(base_url().'js/popper.min.js'); ?>"></script>
    <script src="<?php echo e(base_url().'js/Only.min.js'); ?>" async data-only="<?php echo e(base_url().'js/titan.js'); ?>"></script>
    <title>Sprts Hub - Decentralised sports for the world</title>
</head>
<body>

    <div class="bg-dark text-dark position-fixed w-100 z-100">
        <div class="container nav-toggler">
            <?php echo $__env->make('_inc/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

    <div class="content">
        <div class="shifted">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

</body>
</html>