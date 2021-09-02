    <p class="text-muted">Plot Details</p>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Plot No:
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[plot_no]') is-invalid @enderror"
                placeholder="Plot No" value="{{ old($name.'[plot_no]') }}" name="{{ $name }}[plot_no]" required />
            @error($name.'[plot_no]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Area name:
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[area_name]') is-invalid @enderror" placeholder="Area Name"
                value="{{ old($name.'[area_name]') }}" name="{{ $name }}[area_name]" required />
            @error($name.'[area_name]')
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
            <input type="number" class="form-control @error($name.'[block]') is-invalid @enderror" placeholder="Block"
                value="{{ old($name.'[block]') }}" name="{{ $name }}[block]" required />
            @error($name.'[block]')
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
            <input type="text" class="form-control @error($name.'[property_value]') is-invalid @enderror"
                placeholder="Propert Value" value="{{ old($name.'[property_value]') }}" name="{{ $name }}[property_value]" required />
            @error($name.'[property_value]')
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
            <input type="text" class="form-control @error($name.'[finance_amount]') is-invalid @enderror"
                placeholder="Finance Amount" value="{{ old($name.'[finance_amount]') }}" name="{{ $name }}[finance_amount]" required />
            @error($name.'[finance_amount]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            PAI Rent
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[pai_rent]') is-invalid @enderror" placeholder="PAI Rent"
                value="{{ old($name.'[pai_rent]') }}" name="{{ $name }}[pai_rent]" />
            @error($name.'[pai_rent]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Licensed Purpose
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[licensed_purpose]') is-invalid @enderror"
                placeholder="Licensed Purpose" value="{{ old($name.'[licensed_purpose]') }}" name="{{ $name }}[licensed_purpose]"
             />
            @error($name.'[licensed_purpose]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Application No
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[application_no]') is-invalid @enderror"
                placeholder="Application No" value="{{ old($name.'[application_no]') }}" name="{{ $name }}[application_no]" />
            @error($name.'[application_no]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Plot Area Size
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control @error($name.'[plot_area_size]') is-invalid @enderror"
                placeholder="Application No" value="{{ old($name.'[plot_area_size]') }}" name="{{ $name }}[plot_area_size]" />
            @error($name.'[plot_area_size]')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
