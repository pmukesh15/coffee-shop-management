<div class="sidebar" data-color="purple" data-image="<?php echo e(asset('backend/img/sidebar-1.jpg')); ?>">

    <div class="logo">
        <a href="<?php echo e(route('welcome')); ?>" class="simple-text">
            Coffee Shop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php echo e(Request::is('admin/dashboard*') ? 'active': ''); ?>">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/slider*') ? 'active': ''); ?>" style="display:none">
                <a href="<?php echo e(route('slider.index')); ?>">
                    <i class="material-icons">slideshow</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/category*') ? 'active': ''); ?>">
                <a href="<?php echo e(route('category.index')); ?>">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/item*') ? 'active': ''); ?>">
                <a href="<?php echo e(route('item.index')); ?>">
                    <i class="material-icons">library_books</i>
                    <p>Items</p>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/order*') ? 'active': ''); ?>">
                <a href="<?php echo e(route('order.index')); ?>">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/customer*') ? 'active': ''); ?>" >
                <a href="<?php echo e(route('customer.index')); ?>">
                    <i class="material-icons">account_circle</i>
                    <p>Customers</p>
                </a>
            </li>

        </ul>
    </div>
</div>