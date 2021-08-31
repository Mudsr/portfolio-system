@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Prtfolio</h3>
        </div>

        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Name:
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Portfolio Name" value="{{ old('name') }}" name="name" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Management Fee
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control @error('management_fee') is-invalid @enderror"
                            placeholder="Management Fee" value="{{ old('management_fee') }}" name="management_fee" min="0"
                            step="0.0001" required />
                        @error('management_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Minimum Fee Per Quarter
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control @error('minimum_fee_per_quarter') is-invalid @enderror"
                            placeholder="Minimum Fee Per Quarter" value="{{ old('minimum_fee_per_quarter') }}"
                            name="minimum_fee_per_quarter" min="0" required />
                        @error('minimum_fee_per_quarter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Fee Calculation Method
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control @error('fee_calculation_method') is-invalid @enderror"
                            name="fee_calculation_method">
                            <option value="" class="text-muted">---Select---</option>
                            <option value="flat" {{ old('fee_calculation_method') == 'flat' ? 'selected' : '' }}>Flat</option>
                            <option value="proportioate" {{ old('fee_calculation_method') == 'proportioate' ? 'selected' : '' }}>
                                Proportionate</option>
                        </select>

                        @error('fee_calculation_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Person
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                            placeholder="Contact Person Name" value="{{ old('contact_person') }}" name="contact_person"
                         />
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Number
                    </label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control @error('contact_number') is-invalid @enderror"
                            placeholder="Contact Person Number" value="{{ old('contact_number') }}" name="contact_number"
                         />
                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Email
                    </label>
                    <div class="col-md-8">
                        <input type="email" class="form-control @error('contact_email') is-invalid @enderror"
                            placeholder="Enter email" value="{{ old('contact_email') }}" name="contact_email" />
                        @error('contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Date
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control @error('agreement_date') is-invalid @enderror"
                            value="{{ old('agreement_date') }}" name="agreement_date" />
                        @error('agreement_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Expiry
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control @error('agreement_expiry') is-invalid @enderror"
                            value="{{ old('agreement_expiry') }}" name="agreement_expiry" />
                        @error('agreement_expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Agreement Documnet
                    </label>
                    <div class="col-md-8">
                        <input type="file" class="form-control @error('agreement_document') is-invalid @enderror"
                            name="agreement_document" />
                        @error('agreement_document')
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
