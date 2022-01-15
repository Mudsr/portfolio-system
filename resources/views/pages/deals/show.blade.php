@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12 justify-content-end mb-5">
        <a href="{{ route('view.detail') }}" class="btn btn-primary float-right"> <- Go back to listing </a>
    </div>
</div>
    <div class="row">
        <div class="col-md-6">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">View Deal Detail</h3>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="exampleSelect1" class="col-md-3 col-form-label">
                            Portfolio
                        </label>

                        <div class="col-md-8">
                            <select class="form-control selectpicker @error('portfolio_id') is-invalid @enderror"
                                name="portfolio_id" disabled>
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($portfolios as $portfolio)
                                    <option value="{{ $portfolio->id }}" {{ old('portfolio_id') == $portfolio->id || $deal->portfolio_id == $portfolio->id ? 'selected' : '' }}>{{ $portfolio->name }}</option>
                                @endforeach

                            </select>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleSelect1" class="col-md-3 col-form-label">
                            Client
                        </label>

                        <div class="col-md-8">
                            <select class="form-control selectpicker @error('client_id') is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                name="client_id" disabled>
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('portfolio_id') == $client->id || $deal->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Client id
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $client->id }}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Client Name
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->client->name }}" disabled/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Plot No
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control @error('plot_no') is-invalid @enderror"
                                placeholder="Plot No" value="{{ old('plot_no', $deal->plot_no) }}"
                                name="plot_no" disabled />
                            @error('plot_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Plot No:
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot_no }}" disabled />
                        </div>
                    </div>

                    <p class="text-muted">Plot Details</p>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Area name:
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->area_name }}" disabled />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Block
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot_block }}" disabled />
                            @error('block')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Property Value
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->property_value }}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Finance Amount
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->finance_amount }}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            PAI Rent
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->pai_rent }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Licensed Purpose
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->licensed_purpose }}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Application No
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->application_no }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Plot Area Size
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $deal->plot->plot_area_size }}" disabled />
                        </div>
                    </div>

                </div>
            </div>

        </div>

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

                        <div class="col-md-8">
                            @if ($deal->plot->getMedia('new_deal_email')->count() > 0)
                                <a href="{{ route('media.download', $deal->plot->getMedia('new_deal_email')->first()->id)}}" target="_blank">
                                    {{ $deal->plot->getMedia('new_deal_email')->first()->file_name }}
                                </a>
                            @endif

                        </div>
                    </div>

                    <p class="text-muted">PAI Leasing Contract Document</p>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Issue Date:
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control"
                                    value="{{ old('pai_issue_date', $deal->plot->getMedia('pai')->isNotEmpty() ? $deal->plot->getMedia('pai')->first()->getCustomProperty('issue_date'):'') }}" name="pai_issue_date"  disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Expiry Date:
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control"
                                value="{{ old('pai_expiry_date', $deal->plot->getMedia('pai')->isNotEmpty() ? $deal->plot->getMedia('pai')->first()->getCustomProperty('expiry_date'): '') }}"
                                disabled />

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                            Attachment:
                        </label>
                        <div class="col-md-8">
                            @if ( $deal->plot->getMedia('pai')->isNotEmpty())
                                <a href="{{ route('media.download', $deal->plot->getMedia('pai')->first()->id)}}" target="_blank">
                                    {{ $deal->plot->getMedia('pai')->first()->file_name }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <p class="text-muted">Fire insurance Copy Attachment</p>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Issue Date:
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('fire_insurance_issue_date') is-invalid @enderror"
                                    value="{{ old('fire_insurance_issue_date',  $deal->plot->getMedia('fire_insurance')->isNotEmpty() ? $deal->plot->getMedia('fire_insurance')->first()->getCustomProperty('issue_date'): '') }}"
                                    name="fire_insurance_issue_date"  disabled />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Expiry Date:
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('fire_insurance_expiry_date') is-invalid @enderror"
                                value="{{ old('fire_insurance_expiry_date', $deal->plot->getMedia('fire_insurance')->isNotEmpty() ? $deal->plot->getMedia('fire_insurance')->first()->getCustomProperty('expiry_date'): '') }}"
                                name="fire_insurance_expiry_date"  disabled />

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                            Attachment
                        </label>
                        <div class="col-md-8">
                            @if ($deal->plot->getMedia('fire_insurance')->isNotEmpty())
                                <a href="{{ route('media.download', $deal->plot->getMedia('fire_insurance')->first()->id)}}" target="_blank">
                                    {{ $deal->plot->getMedia('fire_insurance')->first()->file_name }}
                                </a>
                            @endif

                        </div>
                    </div>

                    <p class="text-muted">Power of Attorney</p>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            Issue Date:
                        </label>

                        <div class="col-md-8">
                            <input type="date" class="form-control @error('power_of_attorney_issue_date') is-invalid @enderror"
                                    value="{{ old('power_of_attorney_issue_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ?$deal->plot->getMedia('power_of_attorney')->first()->getCustomProperty('issue_date'): '') }}"
                                    name="power_of_attorney_issue_date"  disabled />
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
                                value="{{ old('power_of_attorney_expiry_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->first()->getCustomProperty('expiry_date'): '') }}"
                                name="power_of_attorney_expiry_date"  disabled />
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
                                value="{{ old('power_of_attorney_issue_to', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->first()->getCustomProperty('issue_to'): '') }}"
                                name="power_of_attorney_issue_to"  disabled />
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
                                <a href="{{ route('media.download', $deal->plot->getMedia('power_of_attorney')->first()->id)}}" target="_blank">
                                    {{ $deal->plot->getMedia('power_of_attorney')->first()->file_name }}
                                </a>
                            @endif


                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                        POA Email
                        </label>

                        <div class="col-md-8">
                            @if ($deal->plot->getMedia('poa_email_attachment')->isNotEmpty())
                                <a href="{{ route('media.download', $deal->plot->getMedia('poa_email_attachment')->first()->id)}}" target="_blank">
                                    {{ $deal->plot->getMedia('poa_email_attachment')->first()->file_name }}
                                </a>
                            @endif
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
@endsection
