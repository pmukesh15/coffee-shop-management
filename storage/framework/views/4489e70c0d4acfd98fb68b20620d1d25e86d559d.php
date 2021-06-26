<?php $__env->startSection('title','Order'); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->make('layouts.partial.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Orders</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($order->name); ?></td>
                                            <td><?php echo e($order->item_name); ?></td>
                                            <td><?php echo e($order->quantity); ?></td>
                                            <td><?php echo e($order->total); ?></td>
                                            <th><?php echo e($order->type); ?></th>
                                            <th>
                                                <?php if($order->status == true): ?>
                                                    <span class="label label-info">Confirmed</span>
                                                <?php else: ?>
                                                    <span class="label label-danger">not Confirmed yet</span>
                                                <?php endif; ?>

                                            </th>
                                            <td><?php echo e($order->created_at); ?></td>
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