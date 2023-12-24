@extends('templates.layouts.app')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            // Use $ here
            $('#category').select2();
            $('#block').select2();
        });

    </script>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Aduan</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Papar</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> PAPAR ADUAN
                                </h5>
                            </div>
                        </div>

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <ul class="list-group">
                                <h5 style="margin-left:10px;margin-top:20px;">Maklumat Aduan</h5> <hr>
                                <li class="list-group-item">
                                    <strong>No Aduan:</strong> {{ $complaint->report_no ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Dilapor oleh:</strong> {{ $complaint->user->name ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Kategori:</strong> {{ $complaint->category->name ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Deskripsi:</strong> {{ $complaint->description ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Blok:</strong> {{ $complaint->block ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Lokasi:</strong> {{ $complaint->location ?? 'N/A' }}
                                </li>
                                <h5 style="margin-left:10px;margin-top:20px;">Maklumat Kerja</h5> <hr>
                                <li class="list-group-item">
                                    <strong>Juruteknik:</strong> {{ optional($complaint->technician)->name ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Dijawab pada:</strong> {{ $complaint->responded_at ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Disiap pada:</strong> {{ $complaint->completed_at ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Catatan Juruteknik:</strong> {{ $complaint->technician_remark ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Penyelia:</strong> {{ optional($complaint->supervisor)->name ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Catatan Penyelia:</strong> {{ $complaint->supervisor_remark ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Status:</strong> {{ $complaint->status ?? 'N/A' }}
                                </li>                
                                <li class="list-group-item">
                                    <strong>Rating:</strong> {{ $complaint->rating ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Dinilai pada:</strong> {{ $complaint->rated_at ?? 'N/A' }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Catatan penilai:</strong> {{ $complaint->rating_remark ?? 'N/A' }}
                                </li>
                            </ul>

                            <div class="d-flex justify-content-start" style="margin-top:50px;">
                                <a href="{{ route('complaints.index') }}" class="btn btn-sm btn-dark mr-2" style="margin-right:5px;">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


