@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Prtfolio</h3>
        </div>

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Name
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Document Name" name="name" required/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Related To
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <select class="form-control @error('related_to') is-invalid @enderror" name="related_to">
                            <option value="" class="text-muted">---Select---</option>
                            <option value="client" {{ old('related_to')=='client' ? 'selected' :'' }} >Client</option>
                            <option value="building" {{ old('related_to')=='building' ? 'selected' :'' }} >Building</option>
                            <option value="contract" {{ old('related_to')=='contract' ? 'selected' :'' }} >Contract</option>
                        </select>
                        @error('related_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Department
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control col-md-8" name="department">
                        <option value="" class="text-muted">---Select---</option>
                        <option value="client">Department1</option>
                        <option value="building">Department2</option>
                        <option value="contract">Department2</option>
                    </select>
                </div> --}}

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Documnet
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="file" class="form-control @error('document') is-invalid @enderror" name="document" required/>
                        @error('document')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>

    </div>

@endsection
