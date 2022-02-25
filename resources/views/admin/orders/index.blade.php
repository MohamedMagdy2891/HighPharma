@extends('admin.layouts.main')
@php
$i[0] = '';
$i[1] = '';
$i[2] = 'active';
$i[3] = '';
$i[4] = '';
$page = 'صفحة كل طلبات العميل';
@endphp
@push('css')
    <style>
        th,
        td {
            font-size: .95rem !important
        }

        .button-a {
            font-size: .8rem;
            border: none !important;
            outline: none !important;
            text-decoration: none !important;
            background-color: #fff
        }


        .button-a:active {
            border: none !important;
            outline: none !important;
        }

        label,
        input {
            font-size: .9rem;
        }

    </style>
@endpush
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
                        <h1 style="font-size: 1.4rem" class="pt-2">الطلبات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right pt-2">
                            <li class="breadcrumb-item "><a href="{{ route('admin.home') }}"
                                    class="text-dark bg-light pl-2 pr-2" style="border-radius: 50px;text-decoration: none"
                                    href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active text-light">طلبات العميل {{ $client->name }}</li>
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
                                <h3 class="card-tools" style="font-size: 1.3rem">السلة</h3>

                                <div class="card-title" style="">
                                    <div class="input-group input-group-sm" style="width: 180px;">


                                        <a href="{{ route('admin.orders.create', $client->id) }}"
                                            class="mr-2 bg-success pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-plus" style="font-size: .8rem"></i> اضف منتج
                                            للطلب</a>
                                        <a href="{{ route('admin.clients.index') }}"
                                            class="mr-2 bg-primary pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-arrow-left" style="font-size: .8rem"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>اسم المنتج</th>
                                            <th>سعر المنتج</th>
                                            <th>الكمية</th>
                                            <th>النوع</th>
                                            <th>السعر الكلى</th>
                                            <th>تاريخ الاضافة</th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @if (count($rows) > 0)
                                            @foreach ($rows as $row)


                                                <tr>
                                                    <td>{{ $row->Product->name }}</td>

                                                    <td>{{ $row->salary }} جنية</td>
                                                    <td>{{ $row->count }}</td>
                                                    <td>
                                                        @if ($row->status == 0)
                                                            قطاعى
                                                        @else
                                                            جملة
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $row->salary * $row->count }} جنية
                                                        @php
                                                            $total = $total + $row->salary * $row->count;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $date_time = explode(' ', $row->created_at);
                                                            $date = $date_time[0];
                                                        @endphp
                                                        {{ $date }}
                                                    </td>



                                                    <td class="text-center">
                                                        <form
                                                            action="{{ route('admin.orders.destroy', [$client->id, $row->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="text-danger button-a"><i
                                                                    class="nav-icon fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            <tr class="bg-dark text-light">
                                                <td colspan="7" class="text-center" id="found">حساب الفاتورة الكلى :
                                                    {{ $total }} جنية
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center" id="found">لا يوجد اي منتجات مضافة
                                                    للطلب
                                                    حاليا</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>


                            </div>
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
