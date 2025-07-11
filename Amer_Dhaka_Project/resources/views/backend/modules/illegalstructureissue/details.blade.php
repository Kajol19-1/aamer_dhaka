@extends('backend.layouts.master')
@section('page_title','Illegal Structure  Issue')
@section('page_sub_title','Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Illegal Structure Issue Details</h4></div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Image:</strong></div>
                    <div class="col-md-8">
                        @if($illegalstructureissue && $illegalstructureissue->image)
    <img src="{{ asset('uploads/illegalstructureissue/' . $illegalstructureissue->image) }}" width="150" height="150">
@else
    <span class="text-muted">No image</span>
@endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>ID:</strong></div>
                    <div class="col-md-8">{{ $illegalstructureissue->id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>User ID:</strong></div>
                    <div class="col-md-8">{{ $illegalstructureissue->user_id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8">{{ $illegalstructureissue->address }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>Issue Type:</strong></div>
                    <div class="col-md-8">{{ $illegalstructureissue->issue_type }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>Description:</strong></div>
                    <div class="col-md-8">{{ $illegalstructureissue->description }}</div>
                </div>

                <div class="text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
