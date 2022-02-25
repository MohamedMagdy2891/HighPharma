<?php
$i[0] = '';
$i[1] = 'active';
$i[2] = '';
$i[3] = '';
$i[4] = '';
$page = 'صفحة اضافة منتج جديد';
?>
<?php $__env->startPush('css'); ?>
    <style>
        th,
        td {
            font-size: .95rem !important
        }

        .button-a {
            font-size: .8rem;
            border-radius: 50px;
            border: 0px !important;
            text-decoration: none !important
        }

        label,
        input {
            font-size: .9rem;
        }

    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header bg-dark mb-5 pt-2 pb-2">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="font-size: 1.4rem" class="pt-2">المخزن</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="<?php echo e(route('admin.home')); ?>"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">المخزن</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-tools" style="font-size: 1.3rem"> اضافة منتج جديد</h3>

                                <div class="card-title" style="">
                                    <div class="input-group input-group-sm" style="width: 30px;">



                                        <a href="<?php echo e(route('admin.products.index')); ?>"
                                            class="mr-2 bg-primary pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-arrow-left" style="font-size: .8rem"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" method="POST" action="<?php echo e(route('admin.products.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <?php echo $__env->make('admin.products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                <!-- /.card-body -->

                                <div class="card-footer text-center">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="submit" class="btn btn-primary w-100" value="اضافة">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                </div>
                            </form>



                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->



    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Mohamed\programes\Newfolder\Newfolder\HighPharma\resources\views/admin/products/create.blade.php ENDPATH**/ ?>