@extends('admin.layouts.app')
@section('main')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="fs-2 fw-bold">Tableau de bord</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-1">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-1 mx-1">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle rounded-1">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

@endsection
