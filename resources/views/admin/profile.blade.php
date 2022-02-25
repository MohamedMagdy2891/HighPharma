@extends('admin.layouts.main')
@php
$i[0] = '';
$i[1] = '';
$i[2] = '';
$i[3] = '';
$i[4] = 'active';
$page = 'الصفحة الشخصية';
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
                        <h1 style="font-size: 1.4rem" class="pt-2">الصفحة الشخصية</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="{{ route('admin.home') }}"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">الصفحة الشخصية</li>
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
                                <h3 class="card-tools" style="font-size: 1.3rem"> تعديل بياناتي



                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('admin.updateProfile') }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">الاسم</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="اسم المتسخدم" value="{{ old('name') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">البريد الالكتورني</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder=" البريد الالكتروني" value="{{ old('email') }}">
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
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="password">كلمة المرور</label>
                                                <input type="password" step="0.01" class="form-control" id="password"
                                                    name="password" placeholder="كلمة المرور">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="confirmedPassword">تاكيد كلمة المرور</label>
                                                <input type="password" step="0.01" class="form-control"
                                                    id="confirmedPassword" name="password_confirmation"
                                                    placeholder="تاكيد كلمة المرور">
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
                                                <select class="form-control p-0 pr-1" name="is_admin" id="is_admin"
                                                    disabled>
                                                    <option selected disabled>اختر رتبة المتسخدم</option>
                                                    @if (old('is_admin') == '1' || Auth::user()->is_admin == 1)
                                                        <option value="1" selected>مدير</option>
                                                    @else
                                                        <option value="1">مدير</option>
                                                    @endif
                                                    @if (old('is_admin') == '0' || Auth::user()->is_admin == 0)
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
                                            <input type="submit" class="btn btn-primary w-100" value="تعديل">
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
    <script>
        $('#name').val('{{ Auth::user()->name }}');
        $('#email').val('{{ Auth::user()->email }}').attr('disabled', 'disabled');
    </script>
    @if (Session::has('error'))
        <script>
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3500
                });
                Toast.fire({
                    type: 'error',
                    title: '{{ Session::get('error') }}'
                });
            });
        </script>
    @endif
    @if (Session::has('success'))
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
                    title: '{{ Session::get('success') }}'
                });
            });
        </script>
    @endif



@endpush
