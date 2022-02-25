@extends('admin.layouts.main')
@php
$i[0] = '';
$i[1] = 'active';
$i[2] = '';
$i[3] = '';
$i[4] = '';
$page = 'صفحة اظهار منتج';
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
                        <h1 style="font-size: 1.4rem" class="pt-2">المخزن</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="{{ route('admin.home') }}"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">المخزن</li>
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
                                <h3 class="card-tools" style="font-size: 1.3rem"> عرض بيانات منتج : {{ $row->name }}
                                </h3>

                                <div class="card-title" style="">
                                    <div class="input-group input-group-sm" style="width: 30px;">



                                        <a href="{{ route('admin.products.index') }}"
                                            class="mr-2 bg-primary pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-arrow-left" style="font-size: .8rem"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form">
                                @include('admin.products.form')


                                <!-- /.card-body -->


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
        $('#name').val('{{ $row->name }}');
        $('#count').val('{{ $row->count }}');
        $('#price_one').val('{{ $row->price_one }}');
        $('#price_gomla').val('{{ $row->price_gomla }}');

        $('#name').attr('disabled', 'disabled');
        $('#count').attr('disabled', 'disabled');
        $('#price_one').attr('disabled', 'disabled');
        $('#price_gomla').attr('disabled', 'disabled');
    </script>




@endpush
