@extends('backend/layouts/master')
@section('page_title','Road Issue')
@section('page_sub_title', 'Create')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"> Create Issue</h4>
            </div>
            <div class="card-body">


                <form action="{{ Route('roadissue.create') }}" method="post"  enctype="multipart/form-data">
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
                            <option value="Manhole"      {{ old('issue_type')=='Manhole' ? 'selected':'' }}>Manhole</option>
                            <option value="Road Surface" {{ old('issue_type')=='Road Surface' ? 'selected':'' }}>Road Surface</option>
                            <option value="Footpath"     {{ old('issue_type')=='Footpath' ? 'selected':'' }}>Footpath</option>
                        </select>
                        @error('issue_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Issue --}}
                    <div class="mb-3">
                        <label for="issue" class="form-label">Issue</label>
                        <select id="issue"
                                name="issue"
                                class="form-select @error('issue') is-invalid @enderror">
                            <option value="">Select Issue</option>
                            <option value="Damage"         {{ old('issue')=='Damage' ? 'selected':'' }}>Damage</option>
                            <option value="Cover Missing"  {{ old('issue')=='Cover Missing' ? 'selected':'' }}>Cover Missing</option>
                        </select>
                        @error('issue')
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