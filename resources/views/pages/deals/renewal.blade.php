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
                                    name="client_id">
                                    <option value="" class="text-muted">---Select---</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('portfolio_id') == $client->id || $deal->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach

                                </select>

                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Plot No
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('plot_no') is-invalid @enderror"
                                    placeholder="Plot No" value="{{ old('plot_no', $deal->plot_no) }}"
                                    name="plot_no" />
                                @error('plot_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Renewal Date
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="date" class="form-control @error('renewed_at') is-invalid @enderror"
                                   value="{{ old('renewed_at', $deal->renewed_at) }}"
                                    name="renewed_at" />
                                @error('renewed_at')
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
            @include('pages.deals.partials.renew-deal-documents')

        </div>
    </form>
@endsection
