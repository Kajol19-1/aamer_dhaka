@extends('backend/layouts/master')
@section('page_title','Illegal Structure Issue')
@section('page_sub_title', 'Create')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"> Create Issue</h4>
            </div>
            <div class="card-body">


                <form action="{{ Route('illegalstructureissue.create') }}" method="post"  enctype="multipart/form-data">
                {{ csrf_field() }}

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
                            <option value="Unauthorized Construction"      {{ old('issue_type')=='Unauthorized_Construction' ? 'selected':'' }}>Unauthorized Construction</option>
                            <option value="Encroachment on Road" {{ old('issue_type')=='Encroachment_on_Road' ? 'selected':'' }}>Encroachment on Road</option>
                            <option value="Illegal Shop"      {{ old('issue_type')=='Illegal_Shop' ? 'selected':'' }}>Illegal Shop</option>
                            <option value="Footpath Encroachment"      {{ old('issue_type')=='Footpath_Encroachment' ? 'selected':'' }}>Footpath Encroachment</option>
                            <option value="Temporary Shelter"      {{ old('issue_type')=='Temporary_Shelter' ? 'selected':'' }}>Temporary Shelter</option>
                            <option value="Illegal Wall or Fence"      {{ old('issue_type')=='Illegal_Wall_or_Fence' ? 'selected':'' }}>Illegal Wall or Fence</option>
                            <option value="Building without Permission"      {{ old('issue_type')=='Building_without_Permission' ? 'selected':'' }}>Building without Permission</option>
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