<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="name">اسم العميل</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم العميل"
                    value="<?php echo e(isset($row) ? $row->name : old('name')); ?>">
            </div>
            <div class="col-md-6">
                <label for="address">العنوان</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="العنوان"
                    value="<?php echo e(isset($row) ? $row->address : old('address')); ?>">
            </div>
        </div>
    </div>
    <?php if($errors->any()): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('name')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('name')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('address')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('address')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="first_phone">رقم الهاتف</label>
                <input type="text" class="form-control" id="first_phone" name="first_phone" placeholder="رقم الهاتف"
                    value="<?php echo e(isset($row) ? $row->first_phone : old('first_phone')); ?>">
            </div>
            <div class="col-md-6">
                <label for="second_phone">رقم هاتف أخر</label>
                <input type="text" class="form-control" id="second_phone" name="second_phone"
                    placeholder="رقم هاتف أخر" value="<?php echo e(isset($row) ? $row->second_phone : old('second_phone')); ?>">
            </div>
        </div>
    </div>
    <?php if($errors->any()): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('first_phone')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('first_phone')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('second_phone')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('second_phone')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php /**PATH C:\Mohamed\programes\Newfolder\Newfolder\HighPharma\resources\views/admin/clients/form.blade.php ENDPATH**/ ?>