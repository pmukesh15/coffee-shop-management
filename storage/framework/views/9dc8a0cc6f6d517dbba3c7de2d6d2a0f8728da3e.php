<?php $__env->startSection('title','Edit'); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->make('layouts.partial.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit Customer</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="<?php echo e(route('customer.update',$customer->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo e($customer->name); ?>">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo e($customer->email); ?>" readonly>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" name="password" value="">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Money in Wallet</label>
                                            <input type="number" class="form-control" name="wallet" value="<?php echo e($walletBal); ?>">
                                        </div>
                                    </div>
                                </div>

                                <a href="<?php echo e(route('customer.index')); ?>" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>