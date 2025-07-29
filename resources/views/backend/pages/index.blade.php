@extends('backend.layouts.main')
@section('title', $pageparams['title'])
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $pageparams['title'] }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index', ['page' => 'welcome']) }}">İdarə Paneli</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>{{ $pageparams['title'] }}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">

                    <div class="ibox-title">
                        <div class="ibox-tools mb-3">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5>{{ $pageparams['title'] }}</h5>
                            </div>

                            @if ($pageparams['routename'] != 'contactus')
                                <div class="col-6 text-right">
                                    <a href="{{ route('admin.create_edit', ['page' => $pageparams['routename']]) }}"
                                        class="btn btn-w-m btn-primary">Yeni</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-bordered table-hover dataTables-base" data-order="1">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    @foreach ($pageparams['fields'] as $key => $value)
                                        @include('backend.pages.parts.fortableheadingfield', [
                                            'value' => $value,
                                        ])
                                    @endforeach
                                    <th class="text-center">Düymələr</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($data) && count($data) > 0)
                                    @foreach ($data as $dat)
                                        <tr class="gradeX">
                                            <td class="text-center">{{ $loop->iteration }}</td>

                                            @foreach ($pageparams['fields'] as $key => $value)
                                                @include('backend.pages.parts.fortablefield', [
                                                    'data' => $dat,
                                                    'type' => $value,
                                                ])
                                            @endforeach

                                            <td class="text-right">
                                                <a href="{{ route('admin.create_edit', ['page' => $pageparams['routename'], 'id' => $dat->id]) }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form
                                                    action="{{ route('admin.destroy', ['page' => $pageparams['routename'], 'id' => $dat->id]) }}"
                                                    class="d-inline-block" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="gradeX text-center text-danger">
                                        Məlumat tapılmadı
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
