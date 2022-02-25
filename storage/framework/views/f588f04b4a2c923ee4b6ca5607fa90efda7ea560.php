<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المتسخدم"
                    value="<?php echo e(old('name')); ?>">
            </div>
            <div class="col-md-6">
                <label for="email">البريد الالكتورني</label>
                <input type="email" class="form-control" id="email" name="email" placeholder=" البريد الالكتروني"
                    value="<?php echo e(old('email')); ?>">
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
                    <?php if($errors->has('email')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('email')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php /**PATH C:\Mohamed\programes\Newfolder\Newfolder\HighPharma\resources\views/admin/users/form.blade.php ENDPATH**/ ?>