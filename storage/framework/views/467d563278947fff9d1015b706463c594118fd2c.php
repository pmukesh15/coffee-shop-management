<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Categories</p>
                            <h3 class="title"><?php echo e($categoryCount); ?>

                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i>
                                <a href="#pablo">Total Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Items</p>
                            <h3 class="title"><?php echo e($itemCount); ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i>
                                <a href="#pablo">Total Items</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Customers</p>
                            <h3 class="title"><?php echo e($customerCount); ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i>
                                <a href="#pablo">Total Customers</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">chrome_reader_mode</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Orders</p>
                            <h3 class="title"><?php echo e($orderCount); ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i>
                                <a href="#pablo"><?php echo e($notConfirmed); ?> Not confirmed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->make('layouts.partial.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Confirmed Orders</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($order->name); ?></td>
                                        <td><?php echo e($order->item_name); ?></td>
                                        <td><?php echo e($order->total); ?></td>
                                        <td><?php echo e($order->type); ?></td>
                                        <th>
                                            <?php if($order->status == true): ?>
                                                <span class="label label-info">Confirmed</span>
                                            <?php else: ?>
                                                <span class="label label-danger">not Confirmed yet</span>
                                            <?php endif; ?>

                                        </th>
                                        <td>
                                            <?php if($order->status == false): ?>
                                                <form id="status-form-<?php echo e($order->id); ?>" action="<?php echo e(route('order.status',$order->id)); ?>" style="display: none;" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you sure you want to verify this request?')){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-<?php echo e($order->id); ?>').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">done</i></button>
                                            <?php endif; ?>
                                            <form id="delete-form-<?php echo e($order->id); ?>" action="<?php echo e(route('order.destory',$order->id)); ?>" style="display: none;" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-<?php echo e($order->id); ?>').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>