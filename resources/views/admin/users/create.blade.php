@extends('admin.layouts.main')
@php
$i[0] = '';
$i[1] = '';
$i[2] = '';
$i[3] = 'active';
$i[4] = '';
$page = 'صفحة اضافة مستخدم جديد';
@endphp
@push('css')
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
@endpush
@section('content')
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
                            <li class="breadcrumb-item "><a href="{{ route('admin.home') }}"
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



                                        <a href="{{ route('admin.users.index') }}"
                                            class="mr-2 bg-primary pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-arrow-left" style="font-size: .8rem"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                @method('POST')
                                @include('admin.users.form')
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
                                @if ($errors->any())
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 pl-2 pr-1 " style="font-size: .8rem;">
                                                @if ($errors->has('password'))
                                                    <div class="bg-danger text-center pt-2 pb-2">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="is_admin">الرتبة</label>
                                            <select class="form-control p-0 pr-1" name="is_admin" id="is_admin">
                                                <option selected disabled>اختر رتبة المتسخدم</option>
                                                @if (old('is_admin') == '1')
                                                    <option value="1" selected>مدير</option>
                                                @else
                                                    <option value="1">مدير</option>
                                                @endif
                                                @if (old('is_admin') == '0')
                                                    <option value="0" selected>مشرف</option>
                                                @else
                                                    <option value="0">مشرف</option>
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12 pl-2 pr-1 " style="font-size: .8rem;">
                                                @if ($errors->has('is_admin'))
                                                    <div class="bg-danger text-center pt-2 pb-2">
                                                        {{ $errors->first('is_admin') }}
                                                    </div>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                @endif

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



@endsection
@push('js')
    <script src="/assets/plugins/toastr/toastr.min.js"></script>



@endpush
