<div class="col-md-6">

    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Deal Documents</h3>
        </div>



            <div class="card-body">

                <p class="text-muted">PAI Leasing Contract Document</p>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Issue Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('pai_issue_date') is-invalid @enderror"
                                value="{{ old('pai_issue_date') }}" name="pai_issue_date" required />
                        @error('pai_issue_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Expiry Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('pai_expiry_date') is-invalid @enderror"
                            value="{{ old('pai_expiry_date') }}" name="pai_expiry_date" required />
                        @error('pai_expiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Attachment
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="file" class="form-control @error('pai_leasing_contract') is-invalid @enderror"
                            name="pai_leasing_contract" required />
                        @error('pai_leasing_contract')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <p class="text-muted">Fire insurance Copy Attachment</p>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Issue Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('fire_insurance_issue_date') is-invalid @enderror"
                                value="{{ old('fire_insurance_issue_date') }}" name="fire_insurance_issue_date" required />
                        @error('fire_insurance_issue_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Expiry Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('fire_insurance_expiry_date') is-invalid @enderror"
                            value="{{ old('fire_insurance_expiry_date') }}" name="fire_insurance_expiry_date" required />
                        @error('fire_insurance_expiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Attachment
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="file" class="form-control @error('fire_insurance_copy') is-invalid @enderror"
                            name="fire_insurance_copy" required />
                        @error('fire_insurance_copy')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <p class="text-muted">Power of Attorney</p>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Issue Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('power_of_attorney_issue_date') is-invalid @enderror"
                                value="{{ old('power_of_attorney_issue_date') }}" name="power_of_attorney_issue_date" required />
                        @error('power_of_attorney_issue_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Expiry Date:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('power_of_attorney_expiry_date') is-invalid @enderror"
                            value="{{ old('power_of_attorney_expiry_date') }}" name="power_of_attorney_expiry_date" required />
                        @error('power_of_attorney_expiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Issued To:
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control @error('power_of_attorney_issue_to') is-invalid @enderror"
                            value="{{ old('power_of_attorney_issue_to') }}" name="power_of_attorney_issue_to" required />
                        @error('power_of_attorney_issue_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Attachment
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="file" class="form-control @error('power_of_attorney_copy') is-invalid @enderror"
                            name="power_of_attorney_copy" required />

                        @error('power_of_attorney_copy')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
    </div>
</div>
