@extends('templates.layouts.app')

@section('content')

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
                        <li class="breadcrumb-item text-muted">Aduan Baharu</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->         
                    <div class="card mt-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    <i class="fas fa-file"></i> ADUAN BAHARU
                                </h5>
                            </div>
                        </div>

                        
                        <!-- display message success or error -->
                        @if(session('success'))
                            <div class="alert alert-primary m-5">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger m-5">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!--begin::Card body-->
                        <div class="card-body py-4">

                            <div class="row">
                                @foreach($complaints as $complaint)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5>
                                                        <i class="fas fa-file"></i> {{ $complaint->report_no ?? null }}
                                                    </h5>
                                                </div>    
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <strong>Tarikh:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}<br>
                                                    ({{ \Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }})
                                                </p>
                                                <p class="card-text">
                                                    <strong>Pelapor:</strong> {{ $complaint->user->name }}<br>
                                                    {{ $complaint->user->mobile_no }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Blok:</strong> {{ $complaint->block }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Kategori:</strong> {{ $complaint->category->name }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Lokasi:</strong> {{ $complaint->location}}                                                </p>
                                                <p class="card-text">
                                                    <strong>Deskripsi:</strong><br>
                                                    {{ $complaint->description }}
                                                </p>
                                                <div class="text-center">
                                                    <a href="{{ route('new-complaints.edit', $complaint) }}" class="btn btn-sm btn-warning" style="padding: 5px;">Assign to &rarr;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

