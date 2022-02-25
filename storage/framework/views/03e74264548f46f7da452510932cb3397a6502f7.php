<?php
$i[0] = '';
$i[1] = '';
$i[2] = 'active';
$i[3] = '';
$i[4] = '';
$page = 'صفحة كل العملاء';
?>
<?php $__env->startPush('css'); ?>
    <style>
        th,
        td {
            font-size: .95rem !important
        }

        .button-a {
            font-size: .8rem;
            border: none !important;
            outline: none !important;
            text-decoration: none !important;
            background-color: #fff
        }


        .button-a:active {
            border: none !important;
            outline: none !important;
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
                        <h1 style="font-size: 1.4rem" class="pt-2">الطلبات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="<?php echo e(route('admin.home')); ?>"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">الطلبات</li>
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
                                <h3 class="card-tools" style="font-size: 1.3rem">جدول الطلبات</h3>

                                <div class="card-title" style="">
                                    <form action="<?php echo e(route('admin.clients.search')); ?>" method="POST"
                                        class="input-group input-group-sm" style="width: 350px;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <input type="text" value="<?php echo e($search_name); ?>" name="name"
                                            class="form-control float-right" placeholder="ابحث باسم العميل">

                                        <div class="input-group-append">
                                            <?php if($search == 'search'): ?>
                                                <a href="<?php echo e(route('admin.clients.index')); ?>" class="btn btn-danger"
                                                    style="color:#fff"><i class="fas fa-times"></i></a>
                                            <?php endif; ?>
                                            <button type="submit" class="btn btn-dark" style="color:#fff"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                        <a href="<?php echo e(route('admin.clients.create')); ?>"
                                            class="mr-2 bg-success pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-plus" style="font-size: .8rem"></i> اضف بيانات
                                            العميل</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>اسم العميل</th>
                                            <th>رقم الهاتف</th>
                                            <th>رقم هاتف أخر</th>
                                            <th>العنوان</th>
                                            <th>تاريخ الطلب</th>
                                            <th colspan="4" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($rows) > 0): ?>
                                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                <tr>
                                                    <td><?php echo e($row->name); ?></td>

                                                    <td><?php echo e($row->first_phone); ?> </td>
                                                    <td>
                                                        <?php if($row->second_phone != null): ?>
                                                            <?php echo e($row->second_phone); ?>

                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($row->address); ?></td>
                                                    <td>
                                                        <?php
                                                            $date_time = explode(' ', $row->created_at);
                                                            $date = $date_time[0];
                                                        ?>
                                                        <?php echo e($date); ?>

                                                    </td>
                                                    <td><a href="<?php echo e(route('admin.orders.index', $row->id)); ?>"
                                                            class="text-success"><i
                                                                class="nav-icon fas fa-file-medical"></i></a>
                                                    </td>
                                                    <td><a href="<?php echo e(route('admin.clients.show', $row->id)); ?>"
                                                            class="text-info"><i class="nav-icon fas fa-eye"></i></a>
                                                    </td>
                                                    <td><a href="<?php echo e(route('admin.clients.edit', $row->id)); ?>"
                                                            class="text-primary"><i class="nav-icon fas fa-pen"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="<?php echo e(route('admin.clients.destroy', $row->id)); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>

                                                            <button type="submit" class="text-danger button-a"><i
                                                                    class="nav-icon fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center" id="found">لا يوجد اي عملاء
                                                    حاليا</td>
                                            </tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                                <div class="container-fluid mt-2 text-left">
                                    <div class="row text-left">
                                        <div class="col-md-12 text-left">
                                            <?php echo e($rows->links()); ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
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
    <?php if(Session::has('success')): ?>
        <script>
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3500
                });
                Toast.fire({
                    type: 'success',
                    title: '<?php echo e(Session::get('success')); ?>'
                });
            });
        </script>
    <?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Work\HighPharma\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>