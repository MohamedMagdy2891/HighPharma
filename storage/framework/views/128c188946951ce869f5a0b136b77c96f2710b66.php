<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="name">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج"
                    value="<?php echo e(old('name')); ?>">
            </div>
            <div class="col-md-6">
                <label for="count">الكملة الموجودة</label>
                <input type="number" class="form-control" id="count" name="count" placeholder="الكمية الموجودة"
                    value="<?php echo e(old('count')); ?>">
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
                    <?php if($errors->has('count')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('count')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="price_one">سعر المنتج قطاعى</label>
                <input type="number" step="0.01" class="form-control" id="price_one" name="price_one"
                    placeholder="سعر المنتج قطاعى" value="<?php echo e(old('price_one')); ?>">
            </div>
            <div class="col-md-6">
                <label for="price_gomla">سعر المنتج بالجملة</label>
                <input type="number" step="0.01" class="form-control" id="price_gomla" name="price_gomla"
                    placeholder="سعر المنتج بالجملة" value="<?php echo e(old('price_gomla')); ?>">
            </div>
        </div>
    </div>
    <?php if($errors->any()): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('price_one')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('price_one')); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    <?php if($errors->has('price_gomla')): ?>
                        <div class="bg-danger text-center pt-2 pb-2">
                            <?php echo e($errors->first('price_gomla')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>


</div>
<?php /**PATH E:\Work\HighPharma\resources\views/admin/products/form.blade.php ENDPATH**/ ?>