<?php
$i[0] = 'active';
$i[1] = '';
$i[2] = '';
$i[3] = '';
$i[4] = '';
$page = 'الصفحة الرئيسية';
?>
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header bg-dark mb-5 pt-2 pb-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-light pt-2" style="font-size: 1.4rem">أحصائيات النظام</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active pt-2 text-light">لوحة التحكم</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e($products); ?></h3>

                                <p>عدد المنتجات</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-store"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($clients); ?></h3>

                                <p>عدد العملاء</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-people-carry"></i>

                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($orders); ?></h3>
                                <p>عدد الطلبات</p>

                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($users); ?></h3>

                                <p>عدد المستخدمين</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/assets/dist/js/pages/dashboard.js"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\HighPharma\resources\views/admin/index.blade.php ENDPATH**/ ?>