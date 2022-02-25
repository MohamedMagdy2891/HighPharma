<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label for="order">المنتج </label>
                <select class="form-control pt-0" id="order" name="order">
                    <option disabled selected>اختر المنتج</option>
                    @foreach ($rows as $row)
                        @if (Session::has('order') && Session::get('order') == $row->id)
                            <option selected value="{{ $row->id }}">{{ $row->name }}</option>
                        @elseif(old('order')== $row->id)
                            <option selected value="{{ $row->id }}">{{ $row->name }}</option>
                        @else
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @php
                
                if (Session::has('count')) {
                    $count = Session::get('count');
                } elseif (old('count') != null) {
                    $count = old('count');
                } else {
                    $count = '';
                }
            @endphp
            <div class="col-md-4">
                <label for="count">الكمية</label>
                <input type="text" class="form-control" id="count" name="count" placeholder="الكمية المطلوبة"
                    value="{{ $count }}">
            </div>
            <div class="col-md-4">
                <label for="type">نوع الصرف</label>
                <select class="form-control pt-0" id="type" name="type">
                    <option selected disabled>اختر نوع الصرف</option>
                    @if (Session::has('type') && Session::get('type') == 0)
                        <option selected value="0">قطاعى</option>
                    @else
                        <option value="0">قطاعى</option>
                    @endif
                    @if (Session::has('type') && Session::get('type') == 1)
                        <option selected value="1">جملة</option>

                    @else
                        <option value="1">جملة</option>
                    @endif

                </select>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('order'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('order') }}
                        </div>
                    @endif

                </div>
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('count'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('count') }}
                        </div>
                    @endif

                </div>
                <div class="col-md-4 pl-2 pr-1 " style="font-size: .8rem;">
                    @if ($errors->has('type'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('type') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
