<div class="col-md-6">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Deal Documents</h3>
        </div>

        <div class="card-body">
            <p class="text-muted">Email Attachment For new Deal</p>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Attachment
                </label>
                {{-- {{ dd($deal->plot->getMedia('new_deal_email')) }} --}}

                <div class="col-md-8">
                    @if ($deal->plot->getMedia('new_deal_email')->count() > 0)
                        <a href="{{ route('media.download', $deal->plot->getMedia('new_deal_email')->last()->id)}}" target="_blank">
                            {{ $deal->plot->getMedia('new_deal_email')->last()->file_name }}
                        </a>
                    @endif

                    <input type="file" class="form-control @error('new_deal_email_attachment') is-invalid @enderror"
                        name="new_deal_email_attachment"  />

                    @error('new_deal_email_attachment')
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
                    <input type="date" class="form-control @error('pai_issue_date') is-invalid @enderror"
                            value="{{ old('pai_issue_date', $deal->plot->getMedia('pai')->isNotEmpty() ? $deal->plot->getMedia('pai')->last()->getCustomProperty('issue_date'):'') }}" name="pai_issue_date"  max="9999-12-31"/>
                    @error('pai_issue_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Expiry Date:
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('pai_expiry_date') is-invalid @enderror"
                        value="{{ old('pai_expiry_date', $deal->plot->getMedia('pai')->isNotEmpty() ? $deal->plot->getMedia('pai')->last()->getCustomProperty('expiry_date'): '') }}"
                        name="pai_expiry_date"  max="9999-12-31"/>
                    @error('pai_expiry_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                    Attachment
                </label>
                <div class="col-md-8">
                    @if ( $deal->plot->getMedia('pai')->isNotEmpty())
                        <a href="{{ route('media.download', $deal->plot->getMedia('pai')->last()->id)}}" target="_blank">
                           {{$deal->plot->getMedia('pai')->last()->file_name}}
                        </a>
                    @endif

                    <input type="file" class="form-control @error('pai_leasing_contract') is-invalid @enderror"
                        name="pai_leasing_contract"  />
                    @error('pai_leasing_contract')
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
                    <input type="date" class="form-control @error('fire_insurance_issue_date') is-invalid @enderror"
                        value="{{ old('fire_insurance_issue_date',  $deal->plot->getMedia('fire_insurance')->isNotEmpty() ? $deal->plot->getMedia('fire_insurance')->last()->getCustomProperty('issue_date'): '') }}"
                        name="fire_insurance_issue_date"  max="9999-12-31"/>
                    @error('fire_insurance_issue_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Expiry Date:
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('fire_insurance_expiry_date') is-invalid @enderror"
                        value="{{ old('fire_insurance_expiry_date', $deal->plot->getMedia('fire_insurance')->isNotEmpty() ? $deal->plot->getMedia('fire_insurance')->last()->getCustomProperty('expiry_date'): '') }}"
                        name="fire_insurance_expiry_date"  max="9999-12-31"/>
                    @error('fire_insurance_expiry_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                    Attachment
                </label>
                <div class="col-md-8">
                    @if ($deal->plot->getMedia('fire_insurance')->isNotEmpty())
                        <a href="{{ route('media.download', $deal->plot->getMedia('fire_insurance')->last()->id)}}" target="_blank">
                            {{ $deal->plot->getMedia('fire_insurance')->last()->file_name }}
                        </a>
                    @endif
                    <input type="file" class="form-control @error('fire_insurance_copy') is-invalid @enderror"
                        name="fire_insurance_copy"  />
                    @error('fire_insurance_copy')
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
                    <input type="date" class="form-control @error('power_of_attorney_issue_date') is-invalid @enderror"
                            value="{{ old('power_of_attorney_issue_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ?$deal->plot->getMedia('power_of_attorney')->last()->getCustomProperty('issue_date'): '') }}"
                            name="power_of_attorney_issue_date"  max="9999-12-31"/>
                    @error('power_of_attorney_issue_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Expiry Date:
                </label>

                <div class="col-md-8">
                    <input type="date" class="form-control @error('power_of_attorney_expiry_date') is-invalid @enderror"
                        value="{{ old('power_of_attorney_expiry_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->last()->getCustomProperty('expiry_date'): '') }}) }}"
                        name="power_of_attorney_expiry_date" max="9999-12-31" />
                    @error('power_of_attorney_expiry_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Issued To:
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control @error('power_of_attorney_issue_to') is-invalid @enderror"
                        value="{{ old('power_of_attorney_issue_to', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->last()->getCustomProperty('issue_to'): '') }}"
                        name="power_of_attorney_issue_to" id="issued_to"  />
                    @error('power_of_attorney_issue_to')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    POA Copy
                </label>

                <div class="col-md-8">
                    @if ($deal->plot->getMedia('power_of_attorney')->isNotEmpty())
                        <a href="{{ route('media.download', $deal->plot->getMedia('power_of_attorney')->last()->id)}}" target="_blank">
                            {{ $deal->plot->getMedia('power_of_attorney')->last()->file_name }}
                        </a>
                    @endif

                    <input type="file" class="form-control @error('power_of_attorney_copy') is-invalid @enderror"
                        name="power_of_attorney_copy"  />

                    @error('power_of_attorney_copy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                POA Email
                </label>

                <div class="col-md-8">
                    @if ($deal->plot->getMedia('poa_email_attachment')->isNotEmpty())
                        <a href="{{ route('media.download', $deal->plot->getMedia('poa_email_attachment')->last()->id)}}" target="_blank">
                           {{ $deal->plot->getMedia('poa_email_attachment')->last()->file_name }}
                        </a>
                    @endif

                    <input type="file" class="form-control @error('poa_email_attachment') is-invalid @enderror"
                        name="poa_email_attachment"  />

                    @error('poa_email_attachment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>

    </div>
</div>
