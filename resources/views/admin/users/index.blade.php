@extends('admin.layouts.main')
@php
$i[0] = '';
$i[1] = '';
$i[2] = '';
$i[3] = 'active';
$i[4] = '';
$page = 'صفحة كل المستخدمين';
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
                                <h3 class="card-tools" style="font-size: 1.3rem">جدول المستخدمين</h3>

                                <div class="card-title" style="">
                                    <form action="{{ route('admin.users.search') }}" method="POST"
                                        class="input-group input-group-sm" style="width: 350px;">
                                        @csrf
                                        @method('POST')
                                        <input type="text" value="{{ $search_name }}" name="name"
                                            class="form-control float-right" placeholder="ابحث باسم المستخدم">

                                        <div class="input-group-append">
                                            @if ($search == 'search')
                                                <a href="{{ route('admin.users.index') }}" class="btn btn-danger"
                                                    style="color:#fff"><i class="fas fa-times"></i></a>
                                            @endif
                                            <button type="submit" class="btn btn-dark" style="color:#fff"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                        <a href="{{ route('admin.users.create') }}"
                                            class="mr-2 bg-success pl-2 pr-2 pt-1 pb-1 button-a"><i
                                                class="nav-icon fas fa-plus" style="font-size: .8rem"></i> اضف مستخدم</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>اسم المستخدم</th>
                                            <th>البريد الالكتورني</th>
                                            <th>الرتبة</th>
                                            <th colspan="3" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            if($search == 'search'){
                                                $count = count($rows);
                                            }else{
                                                $count = count($rows)-1;
                                            }   
                                        @endphp
                                        @if ( $count > 0)
                                            @foreach ($rows as $row)

                                                @if (Auth::user()->id != $row->id)
                                                    <tr>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->email }} </td>
                                                        <td>
                                                            @if ($row->is_admin == 1)
                                                                مدير
                                                            @else
                                                                مشرف
                                                            @endif

                                                        </td>
                                                        <td><a href="{{ route('admin.users.show', $row->id) }}"
                                                                class="text-primary"><i
                                                                    class="nav-icon fas fa-eye"></i></a>
                                                        </td>
                                                        <td><a {{ $row->is_admin == 1 ? 'class="text-dark"' : 'class="text-primary"' }}
                                                                {{ $row->is_admin == 1 ? '' : 'href=/dashboard/users/' . $row->id . '/edit' }}><i
                                                                    class="nav-icon fas fa-pen"></i></a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.users.destroy', $row->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="button-a {{ $row->is_admin == 1 ? 'text-dark ' : 'text-danger ' }}"
                                                                    @if ($row->is_admin == 1) disabled @endif><i
                                                                        class="nav-icon fas fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center" id="found">لا يوجد مستخدمين فى النظام
                                                    حتي الان</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                <div class="container-fluid mt-2 text-left">
                                    <div class="row text-left">
                                        <div class="col-md-12 text-left">
                                            {{ $rows->links() }}
                                        </div>
                                    </div>
                                </div>

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
