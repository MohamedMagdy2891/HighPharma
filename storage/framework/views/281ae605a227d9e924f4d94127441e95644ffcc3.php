<?php
$i[0] = '';
$i[1] = '';
$i[2] = '';
$i[3] = 'active';
$i[4] = '';
$page = 'صفحة اضافة مستخدم جديد';
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
                        <h1 style="font-size: 1.4rem" class="pt-2">المستخدمين</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="<?php echo e(route('admin.home')); ?>"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">المستخدمين</li>
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
                                <h3 class="card-tools" style="font-size: 1.3rem"> اضافة مستخدم جديد</h3>

                                <div class="card-title" style="">
                                    <div class="input-group input-group-sm" style="width: 30px;">



                                        <a href="<?php echo e(route('admin.users.index')); ?>"
                                            class="mr-2 bg-primary pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-arrow-left" style="font-size: .8rem"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" method="POST" action="<?php echo e(route('admin.users.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <?php echo $__env->make('admin.users.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="password">كلمة المرور</label>
                                            <input type="password" step="0.01" class="form-control" id="password"
                                                name="password" placeholder="كلمة المرور">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirmedPassword">تاكيد كلمة المرور</label>
                                            <input type="password" step="0.01" class="form-control" id="confirmedPassword"
                                                name="password_confirmation" placeholder="تاكيد كلمة المرور">
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->any()): ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 pl-2 pr-1 " style="font-size: .8rem;">
                                                <?php if($errors->has('password')): ?>
                                                    <div class="bg-danger text-center pt-2 pb-2">
                                                        <?php echo e($errors->first('password')); ?>

                                                    </div>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="is_admin">الرتبة</label>
                                            <select class="form-control p-0 pr-1" name="is_admin" id="is_admin">
                                                <option selected disabled>اختر رتبة المتسخدم</option>
                                                <?php if(old('is_admin') == '1'): ?>
                                                    <option value="1" selected>مدير</option>
                                                <?php else: ?>
                                                    <option value="1">مدير</option>
                                                <?php endif; ?>
                                                <?php if(old('is_admin') == '0'): ?>
                                                    <option value="0" selected>مشرف</option>
                                                <?php else: ?>
                                                    <option value="0">مشرف</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <?php if($errors->any()): ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 pl-2 pr-1 " style="font-size: .8rem;">
                                                <?php if($errors->has('is_admin')): ?>
                                                    <div class="bg-danger text-center pt-2 pb-2">
                                                        <?php echo e($errors->first('is_admin')); ?>

                                                    </div>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>

                        </div>

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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\HighPharma\resources\views/admin/users/create.blade.php ENDPATH**/ ?>