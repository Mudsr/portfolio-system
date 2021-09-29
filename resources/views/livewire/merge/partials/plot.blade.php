
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $name }}</h3>
        </div>

        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Area name:
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('area_name') is-invalid @enderror"
                        placeholder="Area Name" value="{{ old('area_name', $plot->area_name) }}" name="area_name" required />
                    @error('area_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Block
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('block') is-invalid @enderror"
                        placeholder="Block" value="{{ old('block', $plot->block) }}" name="block"
                        required />
                    @error('block')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Property Value
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('property_value') is-invalid @enderror"
                        placeholder="Propert Value" value="{{ old('property_value', $plot->property_value) }}"
                        name="property_value" required />
                    @error('property_value')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Finance Amount
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('finance_amount') is-invalid @enderror"
                        placeholder="Finance Amount" value="{{ old('finance_amount', $plot->finance_amount) }}"
                        name="finance_amount" required />
                    @error('finance_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    PAI Rent
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('pai_rent') is-invalid @enderror"
                        placeholder="PAI Rent" value="{{ old('pai_rent', $plot->pai_rent) }}"
                        name="pai_rent" required />
                    @error('pai_rent')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Licensed Purpose
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('licensed_purpose') is-invalid @enderror"
                        placeholder="Licensed Purpose" value="{{ old('licensed_purpose', $plot->licensed_purpose) }}"
                        name="licensed_purpose" required />
                    @error('licensed_purpose')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Application No
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('application_no') is-invalid @enderror"
                        placeholder="Application No" value="{{ old('application_no', $plot->application_no) }}"
                        name="application_no" required />
                    @error('application_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Plot Area Size
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('plot_area_size') is-invalid @enderror"
                        placeholder="Application No" value="{{ old('plot_area_size', $plot->plot_area_size) }}"
                        name="plot_area_size" required />
                    @error('plot_area_size')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- <p class="text-muted">Email Attachment For new Deal</p>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Attachment
                    <span class="text-danger">*</span>
                </label>

                <div class="col-md-8">
                    <input type="file" class="form-control @error('new_deal_email_attachment') is-invalid @enderror"
                        name="new_deal_email_attachment" required />

                    @error('new_deal_email_attachment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}

        </div>
    </div>
