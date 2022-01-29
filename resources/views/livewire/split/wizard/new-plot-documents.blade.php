
<p class="text-muted">Email Attachment For new Deal</p>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Attachment
    </label>

    <div class="col-md-8">
        <input type="file" class="form-control @error($name.'[new_deal_email_attachment]') is-invalid @enderror"
            name="{{ $name }}[new_deal_email_attachment]" />

        @error($name.'[new_deal_email_attachment]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>



<p class="text-muted">PAI Leasing Contract Document</p>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Issue Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[pai_issue_date]') is-invalid @enderror"
                value="{{ old($name.'[pai_issue_date]') }}" name="{{ $name }}[pai_issue_date]" max="9999-12-31"/>
        @error($name.'[pai_issue_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Expiry Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[pai_expiry_date]') is-invalid @enderror"
            value="{{ old($name.'[pai_expiry_date]') }}" name="{{ $name }}[pai_expiry_date]" max="9999-12-31"/>
        @error($name.'[pai_expiry_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
        Attachment
    </label>
    <div class="col-md-8">
        <input type="file" class="form-control @error($name.'[pai_leasing_contract]') is-invalid @enderror"
            name="{{ $name }}[pai_leasing_contract]" />
        @error($name.'[pai_leasing_contract]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<p class="text-muted">Fire insurance Copy Attachment</p>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Issue Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[fire_insurance_issue_date]') is-invalid @enderror"
                value="{{ old($name.'[fire_insurance_issue_date]') }}" name="{{ $name }}[fire_insurance_issue_date]" max="9999-12-31"/>
        @error($name.'[fire_insurance_issue_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Expiry Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[fire_insurance_expiry_date]') is-invalid @enderror"
            value="{{ old($name.'[fire_insurance_expiry_date]') }}" name="{{ $name }}[fire_insurance_expiry_date]" max="9999-12-31"/>
        @error($name.'[fire_insurance_expiry_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
        Attachment
    </label>
    <div class="col-md-8">
        <input type="file" class="form-control @error($name.'[fire_insurance_copy]') is-invalid @enderror"
            name="{{ $name }}[fire_insurance_copy]" />
        @error($name.'[fire_insurance_copy]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<p class="text-muted">Power of Attorney</p>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Issue Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[power_of_attorney_issue_date]') is-invalid @enderror"
                value="{{ old($name.'[power_of_attorney_issue_date]') }}" name="{{ $name }}[power_of_attorney_issue_date]" max="9999-12-31"/>
        @error($name.'[power_of_attorney_issue_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Expiry Date:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[power_of_attorney_expiry_date]') is-invalid @enderror"
            value="{{ old($name.'[power_of_attorney_expiry_date]') }}" name="{{ $name }}[power_of_attorney_expiry_date]" max="9999-12-31"/>
        @error($name.'[power_of_attorney_expiry_date]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Issued To:
    </label>

    <div class="col-md-8">
        <input type="date" class="form-control @error($name.'[power_of_attorney_issue_to]') is-invalid @enderror"
            value="{{ old($name.'[power_of_attorney_issue_to]') }}" name="{{ $name }}[power_of_attorney_issue_to]" max="9999-12-31"/>
        @error($name.'[power_of_attorney_issue_to]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Attachment
    </label>

    <div class="col-md-8">
        <input type="file" class="form-control @error($name.'[power_of_attorney_copy]') is-invalid @enderror"
            name="{{ $name }}[power_of_attorney_copy]" />

        @error($name.'[power_of_attorney_copy]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 col-form-label">
    Email Attachment
    </label>

    <div class="col-md-8">
        <input type="file" class="form-control @error($name.'[poa_email_attachment]') is-invalid @enderror"
            name="{{ $name }}[poa_email_attachment]" />

        @error($name.'[poa_email_attachment]')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
