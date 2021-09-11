<div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Report</h3>
                </div>

                <form wire:submit.prevent="GenerateReport" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        Portfolio
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-md-8">
                                        <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
                                            wire:model="portfolio_id" name="portfolio_id">
                                            <option value="" class="text-muted">---Select---</option>
                                            @foreach ($portfolios as $_portfolio)
                                                <option value="{{ $_portfolio->id }}">{{ $_portfolio->name }}</option>
                                            @endforeach

                                        </select>

                                        @error('portfolio_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        Type
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-md-8">
                                        <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
                                            wire:model="portfolio_id" name="portfolio_id">
                                            <option value="" class="text-muted">---Select---</option>
                                            @foreach ($portfolios as $_portfolio)
                                                <option value="{{ $_portfolio->id }}">{{ $_portfolio->name }}</option>
                                            @endforeach

                                        </select>

                                        @error('portfolio_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        From Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control @error('from_date') is-invalid @enderror"
                                                value="{{ old('from_date') }}" name="from_date" />
                                        @error('from_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        To Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control @error('to_date') is-invalid @enderror"
                                                value="{{ old('to_date') }}" name="to_date" />
                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="ml-4">
                            <button type="submit" class="btn btn-primary mr-2">Generate Report</button>

                        </div>


                    </div>
                    {{-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Generate Report</button>
                    </div> --}}
                </form>
            </div>

        </div>
    </div>

    @if (!empty($report))
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">{{ $type }} Report</h3>
                    </div>
                    <div class="card-body">
                        @if ($deals->count() > 0)
                            <table class="table table-responsive w-100 d-block d-md-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-muted">Portfolio</th>
                                        <th scope="col" class="text-muted">Deal Start Date</th>
                                        <th scope="col" class="text-muted">Finance Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deals as $deal)
                                        <tr>
                                            <td>{{ $deal->portfolio->name }}</td>
                                            <td>{{ $deal->entry_date }}</td>
                                            <td>{{ $deal->plot->finance_amount }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="font-weight-bold">Total</td>
                                        <td> </td>
                                        <td class="font-weight-bold" >{{ $deals->sum('plot.finance_amount') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <h3 class="text-muted text-center">No Data Available</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

