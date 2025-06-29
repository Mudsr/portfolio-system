@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Client</h3>
        </div>
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Id
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" value="{{ getClientIdForForm() }}" disabled/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Name
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" name="name" required/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Email
                    </label>
                    <div class="col-md-8">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="someone@example.com" name="email" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Address:
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{ old('address') }}" name="address"/>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Telephone
                    </label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control @error('telephone') is-invalid @enderror" placeholder="Telephone" value="{{ old('telephone') }}" name="telephone"/>
                        @error('telephone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        ID Type
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('id_type') is-invalid @enderror" placeholder="ID Type" value="{{ old('id_type') }}" name="id_type" min="0"/>
                        @error('id_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        ID No
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('id_no') is-invalid @enderror" placeholder="ID No" value="{{ old('id_no') }}" name="id_no" min="0"/>
                        @error('id_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        ID Expiry Date
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control @error('id_expiry') is-invalid @enderror" value="{{ old('id_expiry') }}" name="id_expiry" max="9999-12-31"/>
                        @error('id_expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        ID Copy Attachment
                    </label>
                    <div class="col-md-8">
                        <input type="file" class="form-control @error('id_attachment') is-invalid @enderror"  name="id_attachment" />
                        @error('id_attachment')
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
