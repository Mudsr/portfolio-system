<div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Calculate Fee</h3>
                </div>

                <form wire:submit.prevent="calculateFee" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Select Period
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <select class="form-control selectpicker2 @error('quarter') is-invalid @enderror"
                                    wire:model="quarter" name="quarter">
                                    <option value="" class="text-muted">---Select Period---</option>
                                    <option value="1">Quarter 1 (January - March)</option>
                                    <option value="2">Quarter 2 (April - June)</option>
                                    <option value="3">Quarter 3 (July - September)</option>
                                    <option value="4">Quarter 4 (October - December)</option>
                                </select>

                                @error('quarter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Select Year
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                {{-- <div wire:ignore id="year"> --}}
                                    <select class="form-control selectpicker2 @error('year') is-invalid @enderror"
                                        wire:model="year" name="year" data-size="7" data-live-search="true" data-container="#new_client_id">
                                        <option class="text-muted">---Select Year---</option>
                                        @foreach ($yearsArray as $_year)
                                            <option value="{{ $_year }}">{{ $_year }}</option>
                                        @endforeach
                                    </select>
                                {{-- </div> --}}

                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Calculate</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    @if (!empty($fee))
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Total Fee</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Portfolio
                            </label>

                            <div class="col-md-8">
                                <p>{{ $portfolio->name }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Claculation Period
                            </label>
                            <div class="col-md-8">
                                <p>
                                    Quarter {{ $quarter }}, {{ $year }} (
                                        @if ($quarter == 1)
                                            Jan - March
                                        @endif
                                        @if ($quarter == 2)
                                            April - June
                                        @endif
                                        @if ($quarter == 3)
                                            July - September
                                        @endif
                                        @if ($quarter == 4)
                                            October - December
                                        @endif
                                    )
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                              Total Fee
                            </label>
                            <div class="col-md-8">
                                <p>
                                    {{ $fee }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-title">Management Fee</h3>
                        </div>

                        <div class="card-toolbar">
                            <ul class="nav nav-bold nav-pills">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        Export
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="tab" wire:click="exportExcel" >Export As Excel</a>
                                        <a class="dropdown-item" data-toggle="tab" wire:click="exportPdf">Export As PDF</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($deals->count() > 0)
                            @include('livewire.fee-calculation.listing')
                        @else
                            <h3 class="text-muted text-center">No Plots Exists</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

