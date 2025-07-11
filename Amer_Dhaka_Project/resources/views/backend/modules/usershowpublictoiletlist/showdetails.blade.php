@extends('backend.layouts.master')
@section('page_title','Show Public Toilet Issue Details')
@section('page_sub_title','Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Public Toilet Issue Details Status</h4></div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Image:</strong></div>
                    <div class="col-md-8">
                        @if($publictoiletissue && $publictoiletissue->image)
    <img src="{{ asset('uploads/publictoiletissue/' . $publictoiletissue->image) }}" width="150" height="150">
@else
    <span class="text-muted">No image</span>
@endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>ID:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>User ID:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->user_id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->address }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"><strong>Issue Type:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->issue_type }}</div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-4"><strong>Description:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->description }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Status:</strong></div>
                    <div class="col-md-8">{{ $publictoiletissue->status }}</div>
                </div>

                <div class="text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
