@extends('partials.main')
@push('styles')
<title>Danatama | Tulis Dokuemntasi</title>
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
<style>
    input[readonly] {
        background-color: #E3E6E8 !important;
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
                    <h6 class="page-title">Tambah Documents</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Main</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tulis Document</li>
                    </ol>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body shadow">
                            <h4 class="card-title">Form Input Dokumen</h4>
                            <p class="card-title-desc">Pastikan anda telah menulis dokumen dengan benar.</p>
                            <form action="/tulis-dokumentasi" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Well Done!</strong> You successfully upload new documentation.</a>.
                                </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="no_dokumen" class="form-label">Nomor Dokumen</label>
                                                <input type="text" class="form-control" name="no_dokumen" id="input-no_dokumen" value="{{ $kodeDokumen }}" required="" readonly>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pekerjaan" class="form-label">Nomor Surat (Optional)</label>
                                                <input type="text" class="form-control" name="no_surat" id="no_surat">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="jenis_dokumen" class="form-label">Jenis Dokumen</label>
                                                <select class="form-select" name="jenis_dokumen" id="jenis_dokumen" required="">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="tgl_pekerjaan" class="form-label">Tanggal Pekerjaan</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" class="form-control" name="tgl_pekerjaan" placeholder="dd/M/yyyy"
                                                        data-date-format="dd/m/yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" class="form-control" name="tgl_selesai" placeholder="dd/M/yyyy"
                                                        data-date-format="dd/m/yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea required="" class="form-control" name="description" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="filenames" class="form-label">Upload Dokumen</label>
                                                <input type="file" class="form-control mb-2" name="filenames" id="filenames">
                                                <p class="text-danger">Support Extension : .pdf, .docx, .jpg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-auto text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body shadow">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <label for="validationCustom01" class="form-label mb-3">Last Upload</label>
                                </div>
                                <ul class="message-list">
                                    @foreach ($lastpost as $datapost)
                                    <li class="unread">
                                        <div class="col-mail col-mail-1">
                                            <a href="dokumentasi/{{ $datapost->jenis_doc }}/{{ $datapost->file_name }}" class="title">Pekerjaan: {{ $datapost->pekerjaan }}</a><span class="star-toggle far fa-star"></span>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <div class="date">5:01 am</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div> <!-- container-fluid -->
</div>
@endsection
@push('js')
<script src="assets/libs/select2/js/select2.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
<script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
@endpush
