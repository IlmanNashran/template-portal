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
                        <li class="breadcrumb-item text-muted">Daftar</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> DAFTAR ADUAN
                                </h5>
                            </div>
                        </div>

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="container mt-5">
                                <form method="post">
                                    @csrf

                                    @if(auth()->user()->role == 'technician')
                                        <div class="d-flex justify-content-end" style="margin-top:50px;">
                                            <a href="#" class="btn btn-sm btn-warning mr-2" style="margin-right:5px;">
                                                <i class="fas fa-arrow-left"></i> Take Task
                                            </a>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Kategori</label>
                                        <input class="form-control" id="category" name="category_id" value="{{ $complaint->category->name }}" readonly></input>
                                    </div>

                                    <div class="mb-3">
                                        <label for="block" class="form-label">Blok</label>
                                        <input class="form-control" id="block" name="block" value="{{ $complaint->block }}" readonly></input>

                                    </div>

                                    <div class="mb-3">
                                        <label for="location" class="form-label">lokasi</label>
                                        <input class="form-control" id="location" name="location" value="{{ $complaint->location }}" readonly></input>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" value="{{ $complaint->description }}" readonly>{{ $complaint->description }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-check"></i> Kemaskini
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Style to make Select2 look like form-control */
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
            position: absolute;
            top: 1px;
        }
    </style>

@endsection


