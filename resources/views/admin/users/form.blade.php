<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="اسم المتسخدم"
                    value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label for="email">البريد الالكتورني</label>
                <input type="email" class="form-control" id="email" name="email" placeholder=" البريد الالكتروني"
                    value="{{ old('email') }}">
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
                    @if ($errors->has('email'))
                        <div class="bg-danger text-center pt-2 pb-2">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @endif
