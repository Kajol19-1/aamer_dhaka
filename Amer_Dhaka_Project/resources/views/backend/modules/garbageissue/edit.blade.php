@extends('backend.layouts.master')
@section('page_title', 'Garbage Issue')
@section('page_sub_title', 'Edit')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Edit Issue</h4></div>

            <div class="card-body">
               <form action="{{ route('garbageissue.edit.submit') }}" method="POST" enctype="multipart/form-data">


                    @csrf
                    {{-- keep the record id --}}
                    <input type="hidden" name="id" value="{{ $garbageissue->id }}">

                    {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input  type="text"
                                id="address"
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address', $garbageissue->address) }}">
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Issue Type --}}
                    <div class="mb-3">
                        <label for="issue_type" class="form-label">Issue Type</label>
                        <select id="issue_type"
                                name="issue_type"
                                class="form-select @error('issue_type') is-invalid @enderror">
                            <option value="">Select Issue Type</option>
                            @foreach (['Trash','Dustbin'] as $type)
                                <option value="{{ $type }}" {{ old('issue_type', $garbageissue->issue_type) === $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                        @error('issue_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input  type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $garbageissue->description) }}">
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @if ($garbageissue->image)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/garbageissue/' . $garbageissue->image) }}" alt="Current Image" width="100" height="100" style="object-fit:cover;">
                            </div>
                        @endif
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="Pending" {{ old('status', $garbageissue->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Process" {{ old('status', $garbageissue->status) == 'In Process' ? 'selected' : '' }}>In Process</option>
                            <option value="Solved" {{ old('status', $garbageissue->status) == 'Solved' ? 'selected' : '' }}>Solved</option>
                            <option value="Rejected" {{ old('status', $garbageissue->status) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('garbageissue.list') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection