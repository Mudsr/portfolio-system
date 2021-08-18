<div class="col-md-6">

    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Deal</h3>
        </div>

        <div class="card-body">
            <p class="text-muted">Deal Details</p>

            <div class="form-group row">
                <label for="exampleSelect1" class="col-md-3 col-form-label">
                    Portfolio
                    <span class="text-danger">*</span>
                </label>

                <div class="col-md-8">
                    <select class="form-control @error('portfolio_id') is-invalid @enderror"
                        name="portfolio_id">
                        <option value="" class="text-muted">---Select---</option>
                        @foreach ($portfolios as $portfolio)
                            <option value="{{ $portfolio->id }}" {{ old('portfolio_id') == $portfolio->id ? selected : '' }}>{{ $portfolio->name }}</option>
                        @endforeach

                    </select>

                    @error('portfolio_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleSelect1" class="col-md-3 col-form-label">
                    Client
                    <span class="text-danger">*</span>
                </label>

                <div class="col-md-8">
                    <select class="form-control @error('client_id') is-invalid @enderror"
                        name="client_id">
                        <option value="" class="text-muted">---Select---</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('portfolio_id') == $client->id ? selected : '' }}>{{ $client->name }}</option>
                        @endforeach

                    </select>

                    @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <p class="text-muted">Plot Details</p>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Area name:
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('area_name') is-invalid @enderror"
                        placeholder="Area Name" value="{{ old('area_name') }}" name="area_name" required />
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
                    <input type="number" class="form-control @error('block') is-invalid @enderror"
                        placeholder="Block" value="{{ old('block') }}" name="block" min="0"
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
                    <input type="text" class="form-control @error('proprty_value') is-invalid @enderror"
                        placeholder="Propert Value" value="{{ old('proprty_value') }}"
                        name="proprty_value" min="0" required />
                    @error('proprty_value')
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
                        placeholder="Finance Amount" value="{{ old('finance_amount') }}"
                        name="finance_amount" min="0" required />
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
                        placeholder="PAI Rent" value="{{ old('pai_rent') }}"
                        name="pai_rent" min="0" required />
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
                        placeholder="Licensed Purpose" value="{{ old('licensed_purpose') }}"
                        name="licensed_purpose" min="0" required />
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
                        placeholder="Application No" value="{{ old('application_no') }}"
                        name="application_no" min="0" required />
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
                        placeholder="Application No" value="{{ old('plot_area_size') }}"
                        name="plot_area_size" min="0" required />
                    @error('plot_area_size')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
    </div>
</div>
