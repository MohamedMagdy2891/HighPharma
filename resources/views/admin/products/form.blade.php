<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="name">اسم المنتج</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج"
                    value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label for="count">الكملة الموجودة</label>
                <input type="number" class="form-control" id="count" name="count" placeholder="الكمية الموجودة"
                    value="{{ old('count') }}">
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('name'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('name') }}
                        </div>
                    @endif

                </div>
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('count'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('count') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="price_one">سعر المنتج قطاعى</label>
                <input type="number" step="0.01" class="form-control" id="price_one" name="price_one"
                    placeholder="سعر المنتج قطاعى" value="{{ old('price_one') }}">
            </div>
            <div class="col-md-6">
                <label for="price_gomla">سعر المنتج بالجملة</label>
                <input type="number" step="0.01" class="form-control" id="price_gomla" name="price_gomla"
                    placeholder="سعر المنتج بالجملة" value="{{ old('price_gomla') }}">
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('price_one'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('price_one') }}
                        </div>
                    @endif

                </div>
                <div class="col-md-6 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('price_gomla'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('price_gomla') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif


</div>
