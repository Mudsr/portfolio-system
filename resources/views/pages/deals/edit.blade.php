@extends('layouts.main')

@section('content')
    <form action="{{ route('deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-6">

                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Renew Deal</h3>
                    </div>

                    <div class="card-body">

                        <p class="text-muted">Deal Details</p>

                        <div class="form-group row">
                            <label for="exampleSelect1" class="col-md-3 col-form-label">
                                Portfolio
                                <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-8">
                                <select class="form-control selectpicker @error('portfolio_id') is-invalid @enderror"
                                    name="portfolio_id">
                                    <option value="" class="text-muted">---Select---</option>
                                    @foreach ($portfolios as $portfolio)
                                        <option value="{{ $portfolio->id }}" {{ old('portfolio_id') == $portfolio->id || $deal->portfolio_id == $portfolio->id ? 'selected' : '' }}>{{ $portfolio->name }}</option>
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
                                <select class="form-control selectpicker @error('client_id') is-invalid @enderror"
                                    data-size="7" data-live-search="true"
                                    name="client_id" id="client_select">
                                    <option value="" class="text-muted">---Select---</option>
                                    <option class="font-weight-bold" disabled>
                                        Client Id: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Client Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        ID No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Telephone:
                                    </option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" data-name= "{{ $client->name }}"
                                            {{ old('client_id') == $client->id || $deal->client_id == $client->id ? 'selected' : '' }}
                                        >
                                            {{ $client->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ $client->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ $client->id_no }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ $client->telephone }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Client id
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ old('clientId') }}" name="clientId" id="clientId" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Client Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name') }}" name="client_name" id="client_name" disabled />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Plot No:
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('plot_no') is-invalid @enderror"
                                    placeholder="Plot No" value="{{ old('plot_no', $deal->plot_no) }}" name="plot_no" required />
                                @error('plot_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Entry Date
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="date" class="form-control  @error('entry_date') is-invalid @enderror"
                                    value="{{ old('entry_date', $deal->entry_date) }}" name="entry_date" required max="9999-12-31"/>
                                @error('entry_date')
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
                                    placeholder="Area Name" value="{{ old('area_name', $deal->plot->area_name) }}" name="area_name" required />
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
                                    placeholder="Block" value="{{ old('block',$deal->plot->block) }}" name="block"
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
                                <input type="number" class="form-control @error('property_value') is-invalid @enderror"
                                    placeholder="Propert Value" value="{{ old('property_value', $deal->plot->property_value) }}" min="0"
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
                                <input type="number" class="form-control @error('finance_amount') is-invalid @enderror"
                                    placeholder="Finance Amount" value="{{ old('finance_amount', $deal->plot->finance_amount) }}" min="0"
                                    name="finance_amount" required />
                                @error('finance_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                PAI Rent
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('pai_rent') is-invalid @enderror"
                                    placeholder="PAI Rent" value="{{ old('pai_rent', $deal->plot->pai_rent) }}"
                                    name="pai_rent" />
                                @error('pai_rent')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                PAI Client ID
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('pai_client_id') is-invalid @enderror"
                                    placeholder="PAI Client ID" value="{{ old('pai_client_id', $deal->plot->pai_client_id) }}"
                                    name="pai_client_id" />
                                @error('pai_client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Client Civil ID
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('client_civil_id') is-invalid @enderror"
                                    placeholder="Client Civil ID" value="{{ old('client_civil_id', $deal->plot->client_civil_id) }}"
                                    name="client_civil_id" />
                                @error('client_civil_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Licensed Purpose
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('licensed_purpose') is-invalid @enderror"
                                    placeholder="Licensed Purpose" value="{{ old('licensed_purpose', $deal->plot->licensed_purpose) }}"
                                    name="licensed_purpose" />
                                @error('licensed_purpose')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Application No
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('application_no') is-invalid @enderror"
                                    placeholder="Application No" value="{{ old('application_no', $deal->plot->application_no) }}"
                                    name="application_no" />
                                @error('application_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Plot Area Size
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('plot_area_size') is-invalid @enderror"
                                    placeholder="Application No" value="{{ old('plot_area_size', $deal->plot->plot_area_size) }}"
                                    name="plot_area_size" />
                                @error('plot_area_size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('deals.index') }}">
                            <button class="btn btn-secondary">Cancel</button>
                        </a>
                    </div>
                </div>
            </div>

            @include('pages.deals.partials.renew-deal-documents')

        </div>
    </form>
@endsection
@section('scripts')
    <script>
        populateClientData()

        $(function(){
            $('#client_select').change(function(){
                populateClientData()
            });
        });

        function populateClientData()
        {
            var selected = $('#client_select').find('option:selected');
            var clientId = selected.val();
            var clientName = selected.attr('data-name');
            $('#client_name').val(clientName);
            $('#clientId').val(clientId);
            $('#issued_to').val(clientName);
        }
    </script>
@endsection
