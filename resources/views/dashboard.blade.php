@extends('partials.main')
@push('styles')
        <title>Danatama | Damar Navikom Pratama</title>
@endpush
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Dashboard</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Welcome back, <span class="text-info">{{ auth()->user()->name }}</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/04.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">Total Dokumen</h5>
                            <h4 class="fw-medium font-size-24">{{ $countDoc }}</h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Since last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-start mini-stat-img me-4">
                                <img src="assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase text-white-50">Total Users</h5>
                            <h4 class="fw-medium font-size-24">{{ $countUser }}</h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-end">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Since last month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Upload Document</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Pekerjaan</th>
                                        <th scope="col" colspan="2">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->nomor_dokumen }}</th>
                                        <td>
                                            {{ $item->name_user }}
                                        </td>
                                        <td>{{ $item->dateCreate }}</td>
                                        <td>{{ $item->pekerjaan }}</td>
                                        <td>{{ $item->name_category }}</td>
                                        <td>
                                            <div>
                                                <a href="dokumentasi/{{ $item->name_category }}/{{ $item->file_name }}" class="btn btn-warning btn-sm">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Activity</h4>
                        <ol class="activity-feed">
                            @foreach ($data  as $document)
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <span class="date">{{ $document->dateCreate2 }}</span>
                                    <span class="activity-text"><span class="text-info">{{ $document->name_user }}</span>, baru saja menambahkan dokumen baru untuk pekerjaan {{ $document->pekerjaan }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
@push('js')


<!-- Peity chart-->
<script src="assets/libs/peity/jquery.peity.min.js"></script>

<!-- Plugin Js-->
<script src="assets/libs/chartist/chartist.min.js"></script>
<script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>
@endpush
