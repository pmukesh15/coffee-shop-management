<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Styles -->
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo e(asset('backend/css/material-dashboard.css')); ?>" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo e(asset('backend/css/demo.css')); ?>" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <?php if(Request::is('admin*')): ?>
                <?php echo $__env->make('layouts.partial.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
            <div class="main-panel">
                <?php if(Request::is('admin*')): ?>
                    <?php echo $__env->make('layouts.partial.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                <?php if(Request::is('admin*')): ?>
                    <?php echo $__env->make('layouts.partial.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('backend/js/material.min.js')); ?>" type="text/javascript"></script>
    <!--  Dynamic Elements plugin -->
    <script src="<?php echo e(asset('backend/js/arrive.min.js')); ?>"></script>
    <!--  PerfectScrollbar Library -->
    <script src="<?php echo e(asset('backend/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo e(asset('backend/js/bootstrap-notify.js')); ?>"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo e(asset('backend/js/material-dashboard.js')); ?>"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo e(asset('backend/js/demo.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <?php echo Toastr::message(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
