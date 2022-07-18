@extends('partials.main')
@push('styles')
    <title>Arsip Documents | Dokuemntasi</title>
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <style>
            input:.read-only{
                background-color: #ccc;
            }
        </style>
@endpush
@section('container')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Datalist Dokuemntasi</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Arsip Dokumen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokuemntasi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Dokuemntasi</h4>
                        <p class="card-title-desc">Berikut adalah Dokuemntasi yang berada di dalam Aplikasi.
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive display datatable nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nomor Dokumen</th>
                                    <th>Pekerjaan</th>
                                    <th>Tanggal Pengerjaan</th>
                                    <th>Selesai Pengerjaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">
                        View Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="category_id" value="{{ $cat }}">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="no_dokumen" class="form-label">Nomor Dokumen</label>
                            <input type="text" class="form-control read-only" id="no_dokumen" value="asdsad" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_dokumen" class="form-label">Jenis Dokumen</label>
                            <input type="text" class="form-control read-only" id="jenis_dokumen" value="" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control read-only" id="pekerjaan" value="" readonly>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tgl_pekerjaan" class="form-label">Tanggal Pekerjaan</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control read-only" id="tgl_pekerjaan" placeholder="dd/M/yyyy"
                                    data-date-format="dd/m/yyyy" data-date-container='#datepicker1' data-provide="datepicker" readonly>

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control read-only" id="tgl_selesai" placeholder="dd/M/yyyy"
                                    data-date-format="dd/m/yyyy" data-date-container='#datepicker1' data-provide="datepicker" readonly>

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea required="" class="form-control read-only" id="description" rows="5" readonly></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <iframe width="100%" height="500" id="show-files" class="embed-responsive-item" src=""></iframe>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@push('js')
        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <script src="assets/js/pages/app2.init.js"></script>
@endpush
