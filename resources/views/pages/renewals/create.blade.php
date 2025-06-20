@extends('layouts.main')

@section('content')
    <form action="{{ route('deals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Create Renewal</h3>
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
                                <select class="form-control selectpicker @error('client_id') is-invalid @enderror"
                                    data-size="7" data-live-search="true"
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

                        <div class="form-group row">
                            <label for="exampleSelect1" class="col-md-3 col-form-label">
                                Plot No
                                <span class="text-danger">*</span>
                            </label>

                            {{-- <div class="col-md-8">
                                <select class="form-control selectpicker @error('client_id') is-invalid @enderror"
                                    data-size="7" data-live-search="true"
                                    name="client_id">
                                    <option value="" class="text-muted">---Select---</option>
                                    @foreach ($deals as $deal)
                                        <option value="{{ $client->id }}" {{ old('portfolio_id') == $client->id ? selected : '' }}>{{ $client->name }}</option>
                                    @endforeach

                                </select>

                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
