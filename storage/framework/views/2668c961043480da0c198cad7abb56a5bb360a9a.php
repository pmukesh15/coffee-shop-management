<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Coffee Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/pricing.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datetimepicker.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <style>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child(<?php echo e($key + 1); ?>) .item
            {
                background: url(<?php echo e(asset('uploads/slider/'.$slider->image)); ?>);
                background-size: cover;
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #8bc34a;
            border-color: #3c763d;
        }
    </style>

    <script src="<?php echo e(asset('frontend/js/jquery-1.11.2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.flexslider.min.js')); ?>"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>



</head>
<body data-spy="scroll" data-target="#template-navbar">

<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img id="logo" src="<?php echo e(asset('frontend/images/Logo_main.png')); ?>" class="logo img-responsive">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" style="color:yellow !important;">Hi, <?php echo e(Auth::user()->name); ?> !</a></li>
                <li><a href="#menu-list">menu list</a></li>
                <li><a href="#order">order</a></li>
                <li><a href="#wallet">wallet ( $<?php echo e($walletBal); ?> )</a></li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" style="display: none">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="container">
                <div class="header-content">
                    <h1 class="header-title"><?php echo e($slider->title); ?></h1>
                    <p class="header-sub-title"><?php echo e($slider->sub_title); ?></p>
                </div> <!-- /.header-content -->
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<!--==  6. Pricing  ==-->
<section id="menu-list" class="menu-list">
    <div id="w">
        <div class="pricing-filter">
            <div class="pricing-filter-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="section-header">
                                <h2 class="pricing-title">Our Menu List In Affordable Pricing</h2>
                                <ul id="filter-list" class="clearfix">
                                    <li class="filter" data-filter="all">All</li>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="filter" data-filter="#<?php echo e($category->slug); ?>"><?php echo e($category->name); ?> <span class="badge"><?php echo e($category->item_count); ?></span></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul><!-- @end  #filter-list -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item" id="<?php echo e($item->category_slug); ?>">
                                <a href="#">
                                    <img src="<?php echo e(asset('backend/img/'.$item->image)); ?>" class="img-responsive" alt="Item" style="height: 300px; width: 369px;" >
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3><?php echo e($item->name); ?></h3>
                                                <?php echo e($item->description); ?>

                                            </span>
                                    </div>
                                </a>
                                <h2 class="white">$<?php echo e($item->price); ?></h2>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- <div class="text-center">
                            <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
</section>



<!--== 15. Place Your Order! ==-->
<section id="order" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="<?php echo e(asset('frontend/images/icons/reserve_black.png')); ?>">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Place Your Order !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#order -->

<section class="order">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="<?php echo e(asset('frontend/images/icons/reserve_color.png')); ?>">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="order-form" method="post" action="<?php echo e(route('order.order')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control order-form empty iconified" name="category" id="category"
                                               placeholder="Category">
                                            <option value="">-category-</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>       
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control order-form empty iconified" name="quantity" id="quantity"  placeholder="Quantity">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control order-form empty iconified" name="item" id="item"
                                                placeholder="Item">
                                                <option value="">-item-</option>
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                    <input type="number" class="form-control order-form empty iconified" name="total" id="total" readonly  placeholder="Total">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <select class="form-control order-form empty iconified" name="type" id="type"
                                                placeholder="Payment Method">
                                        <option value="wallet">Pay using wallet</option>
                                        <option value="cod">Cash on delivery</option>
                                    </select>  
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-order">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Place Order
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="opening-time">
                            <h3 class="opening-time-title">Hours</h3>
                            <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                            <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                            <div class="launch">
                                <h4>Lunch</h4>
                                <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                            </div>

                            <div class="dinner">
                                <h4>Dinner</h4>
                                <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                <p>Sun: 5:30 PM - 12:00 AM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="
                        margin-top: 25px;
                        background-color: rgb(139, 195, 74);
                        color: white;
                        border-radius: 10px;
                    ">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Order History</h>
                            </div>
                            <div class="card-content table-responsive">
                                <table id="table" class="table"  cellspacing="0" width="100%">
                                    <thead class="">
                                    <th>ID</th>
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
                                                        <form id="cancel-form-<?php echo e($order->id); ?>" action="<?php echo e(route('order.cancel',$order->id)); ?>" style="display: none;" method="GET">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('CANCEL'); ?>
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to cancel this?')){
                                                            event.preventDefault();
                                                            document.getElementById('cancel-form-<?php echo e($order->id); ?>').submit();
                                                        }else {
                                                            event.preventDefault();
                                                                }"><i class="material-icons">cancel</i></button>
                                                    <?php endif; ?>
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
    </div>
</section>

<!--== 15. Place Your Order! ==-->
<section id="wallet" class="wallet">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="<?php echo e(asset('frontend/images/icons/reserve_black.png')); ?>">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Manage Your Wallet !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> <!-- /.dis-table -->
        </div> <!-- /.row -->
    </div> <!-- /.wrapper -->
</section> <!-- /#order -->

<section class="wallet">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="<?php echo e(asset('frontend/images/icons/reserve_color.png')); ?>">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <form class="recharge-form" method="post" action="<?php echo e(route('wallet.recharge')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="number" class="form-control recharge-form empty iconified" name="recharge_amount" id="recharge_amount"
                                                placeholder="  $  Amount">
                                        </div>
                                        <button type="submit" id="submit-recharge" name="submit-recharge" class="btn btn-order">
                                            <span><i class="fa fa-credit-card"></i></span>
                                            Recharge
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <form class="withdraw-form" method="post" action="<?php echo e(route('wallet.withdraw')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="number" class="form-control withdraw-form empty iconified" name="withdraw_amount" id="withdraw_amount"
                                                placeholder="  $  Amount">
                                        </div>
                                        <button type="submit" id="submit-withdraw" name="submit-withdraw" class="btn btn-order">
                                            <span><i class="fa fa-money"></i></span>
                                            Withdraw
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-2 hidden-sm hidden-xs"></div>

                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="balance opening-time">
                            <h3 class="balance-title">Balance</h3>
                            <h2>$<?php echo e($walletBal); ?></h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="copyright text-center">
                    <p>
                        &copy; Copyright, <?php echo e(date('Y')); ?> <a href="#">Coffee Shop.</a> <strong> Developed by Mukesh P.</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.mixitup.min.js')); ?>" ></script>
<script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.validate.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.hoverdir.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('frontend/js/jQuery.scrollSpeed.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <script>
           toastr.error('<?php echo e($error); ?>');
       </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<script>
    $(function () {
        var globalPrice = 0;
        $('#table').DataTable();
        $('#datetimepicker1').datetimepicker({
            format: "dd MM yyyy - HH:11 P",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
        $('#category').change(function(){
            var category = $(this).val();
            $.ajax({
                url : '<?php echo e(route("get-items")); ?>',
                type : 'GET',
                data : {
                    'category' : category
                },
                dataType:'json',
                success : function(data) { 
                    var strAppend = "<option value=''>-item-</option>";          
                    jQuery.each(data, function(index, item) {
                        strAppend += "<option value='"+item.id+"' data-price='"+item.price+"'>"+item.name+"</option>";
                    });
                    $('#item').html(strAppend);
                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });
        });
        $('#item').change(function(){
            $('#quantity').val(1);
            globalPrice = $(this).find(':selected').data('price');
            $('#total').val(globalPrice);
        });
        $('#quantity').change(function(){
            $('#total').val(parseFloat($(this).val())*parseFloat(globalPrice));
        });
    })
</script>
<?php echo Toastr::message(); ?>

</body>
</html>