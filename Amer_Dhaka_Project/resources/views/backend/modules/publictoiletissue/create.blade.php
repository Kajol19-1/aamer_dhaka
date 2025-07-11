@extends('backend/layouts/master')
@section('page_title','Publictoilet Issue')
@section('page_sub_title', 'Create')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"> Create Issue</h4>
            </div>
            <div class="card-body">

<form action="{{ route('publictoiletissue.create.submit') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
            {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input  type="text"
                                id="address"
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}"
                                placeholder="Location">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Issue Type --}}
                    <div class="mb-3">
                        <label for="issue_type" class="form-label">Issue Type</label>
                        <select id="issue_type"
                                name="issue_type"
                                class="form-select @error('issue_type') is-invalid @enderror">
                            <option value="">Select Issue Type</option>
                            <option value="Cleanliness"      {{ old('issue_type')=='Cleanliness' ? 'selected':'' }}>Cleanliness</option>
                            <option value="Broken Infrastructure" {{ old('issue_type')=='Broken_Infrastructure' ? 'selected':'' }}>Broken Infrastructure</option>
                            <option value="No water"      {{ old('issue_type')=='No_Water' ? 'selected':'' }}>No water</option>
                            <option value="No Lighting"      {{ old('issue_type')=='No_Lighting' ? 'selected':'' }}>No Lighting</option>
                        </select>
                        @error('issue_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input  type="text"
                                id="description"
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                value="{{ old('description') }}"
                                placeholder="Write Description">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input  type="file"
                                id="image"
                                name="image"
                                class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{route('back.index')}}" class="btn btn-secondary ms-2">Back to Home</a>
                    </div>
                </form>
            </div> {{-- /.card-body --}}
        </div>
    </div>
</div>
@endsection