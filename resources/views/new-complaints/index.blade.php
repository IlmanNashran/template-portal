@extends('templates.layouts.app')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle table on button click
            $("#toggleTable").click(function () {
                $("#complaintTable").toggle();
            });
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
                            <!-- Display total complaints -->
                            <h5 class="m-5 text-danger">Jumlah Aduan: {{$complaints->count()}}&nbsp;&nbsp;<button class="btn btn-sm btn-primary mb-3" id="toggleTable">Ringkasan</button></h5>
                            

                            <!-- Your table (hidden by default) -->
                            <table class="mb-3 table table-bordered table-hover small table-striped" id="complaintTable" style="display: none;">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No Aduan</th>
                                        <th scope="col">Blok</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Juruteknik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $complaint)
                                        <tr>
                                            <td>{{ $complaint->report_no }}</td>
                                            <td>{{ $complaint->block }}</td>
                                            <td>{{ $complaint->category->name }}</td>
                                            <td>{{ $complaint->technician->name ?? 'N/A'}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mb-3">
                                <form method="GET" action="{{ route('new-complaints.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="No Aduan" name="search" value="{{ request('search') }}">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i> Cari
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                @foreach($complaints as $complaint)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5>
                                                        <i class="fas fa-file"></i> {{ $complaint->report_no ?? null }} <span class="badge {{ $complaint->getStatusBadgeClass() }}">{{ $complaint->status }}</span>
                                                    </h5>
                                                </div>    
                                            </div>
                                            <div class="card-body">
                                                <div class="sv_manager_view">
                                                    <p class="card-text">
                                                        <strong>Tarikh:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->format('d-m-Y') }}<br>
                                                        ({{ \Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }})
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Pelapor:</strong><br>
                                                        {{ $complaint->user->name }}<br>
                                                        {{ $complaint->user->mobile_no }}
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Blok:</strong> {{ $complaint->block }}
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Kategori:</strong> {{ $complaint->category->name }}
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Lokasi:</strong> {{ $complaint->location }}
                                                    </p>
                                                    <p class="card-text">
                                                        <strong>Deskripsi:</strong><br>
                                                        {{ $complaint->description }}
                                                    </p>
                                                    <form method="post" action="{{ route('new-complaints.update-technician', $complaint) }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <select class="form-select" id="technician" name="technician_id">
                                                                <option value="">Pilih Juruteknik</option>
                                                                @foreach($technicians as $technician)
                                                                    <option value="{{ $technician->id }}" @if($technician->id == $complaint->technician_id) selected @endif>
                                                                        {{ $technician->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-check"></i> Kemaskini
                                                        </button>
                                                    </form>
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

