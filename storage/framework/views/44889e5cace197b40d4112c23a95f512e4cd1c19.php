<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="order">المنتج </label>
                <select class="form-control pt-0" id="order" name="order">
                    <option disabled selected>اختر المنتج</option>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Session::has('order') && Session::get('order') == $row->id): ?>
                            <option selected value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                        <?php elseif(old('order')== $row->id): ?>
                            <option selected value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php
                
                if (Session::has('count')) {
                    $count = Session::get('count');
                } elseif (old('count') != null) {
                    $count = old('count');
                } else {
                    $count = '';
                }
            ?>
            <div class="col-md-4">
                <label for="count">الكمية</label>
                <input type="text" class="form-control" id="count" name="count" placeholder="الكمية المطلوبة"
                    value="<?php echo e($count); ?>">
            </div>
            <div class="col-md-4">
                <label for="type">نوع الصرف</label>
                <select class="form-control pt-0" id="type" name="type">
                    <option selected disabled>اختر نوع الصرف</option>
                    <?php if(Session::has('type') && Session::get('type') == 0): ?>
                        <option selected value="0">قطاعى</option>
                    <?php else: ?>
                        <option value="0">قطاعى</option>
                    <?php endif; ?>
                    <?php if(Session::has('type') && Session::get('type') == 1): ?>
                        <option selected value="1">جملة</option>

                    <?php else: ?>
                        <option value="1">جملة</option>
                    <?php endif; ?>

                </select>
            </div>
        </div>
    </div>
    <?php if($errors->any()): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('order')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('order')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('count')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('count')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('type')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('type')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php /**PATH E:\Work\HighPharma\resources\views/admin/orders/form.blade.php ENDPATH**/ ?>