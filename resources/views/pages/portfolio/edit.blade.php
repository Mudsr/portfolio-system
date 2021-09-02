@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Update Portfolio</h3>
        </div>
        <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Update Effective From
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control @error('update_effective_from') is-invalid @enderror"
                            value="{{ old('update_effective_from', $portfolio->update_effective_from) }}"
                            name="update_effective_from"
                            required />
                        @error('management_fee')
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
                            placeholder="Management Fee" value="{{ old('management_fee', $portfolio->management_fee) }}"
                            name="management_fee" min="0"  step="0.0001" required />
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
                            placeholder="Minimum Fee Per Quarter"
                            value="{{ old('minimum_fee_per_quarter', $portfolio->minimum_fee_per_quarter) }}"
                            name="minimum_fee_per_quarter" min="0" required />
                        @error('minimum_fee_per_quarter')
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
                            placeholder="Contact Person Name"
                            value="{{ old('contact_person', $portfolio->contact_person) }}" name="contact_person" />
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
                            placeholder="Contact Person Number"
                            value="{{ old('contact_number', $portfolio->contact_number) }}" name="contact_number"
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
                            placeholder="Enter email" value="{{ old('contact_email', $portfolio->contact_email) }}"
                            name="contact_email" />
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Date
                    </label>
                    <div class="col-md-8">
                        <input type="date"
                            class="form-control @error('agreement_date') is-invalid @enderror"
                            value="{{ old('agreement_date', $portfolio->agreement_date) }}"
                            name="agreement_date" placeholder="Password" />
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
                        <input type="date"
                            class="form-control @error('agreement_expiry') is-invalid @enderror"
                            value="{{ old('agreement_expiry', $portfolio->agreement_expiry) }}"
                            name="agreement_expiry" />
                        @error('agreement_expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Agreement Documnet
                        <span class="text-danger">*</span>
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
