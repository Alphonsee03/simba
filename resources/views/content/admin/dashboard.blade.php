@extends('layouts.admin-layout')

@section('content')
<div class="page-heading">
        <h3>Dashboard Admin</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="d-flex align-items-center">
                                    <div class="stats-icon bg-primary me-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="text-muted mb-0">User</h6>
                                        <h6 class="font-extrabold mb-0">120</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
@endsection
