<div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Rent Report</h3>
                

        
            </div>
                <form wire:submit.prevent="generateReport" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        Portfolio
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="col-md-4">
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


                                    <div class="col-md-4">
                                        <select class="form-control selectpicker2 @error('status') is-invalid @enderror"
                                            wire:model="status" name="status">
                                            <option value="" class="text-muted">---Select---</option>
                                            <option value="pending" class="text-muted">Pending</option>
                                            <option value="paid" class="text-muted">Paid</option>
                                            <option value="expiry" class="text-muted">Expiry</option>
                                            <option value="client" class="text-muted">By Client</option>

                                        </select>

                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                        </div>
                        @if($status == "paid")
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        From Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control @error('from_date') is-invalid @enderror"
                                                value="{{ old('from_date') }}" name="from_date" wire:model = "from_date" />
                                        @error('from_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        To Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control @error('to_date') is-invalid @enderror"
                                                value="{{ old('to_date') }}" name="to_date" wire:model = "to_date" max="9999-12-31"/>
                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($status == "expiry")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        From Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control @error('from_date') is-invalid @enderror"
                                                value="{{ old('from_date') }}" name="from_date" wire:model = "from_date" max="9999-12-31"/>
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
                                                value="{{ old('to_date') }}" name="to_date" wire:model = "to_date" max="9999-12-31"/>
                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        
                        @if($status == "client")

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        Client Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <div wire:ignore id="client_id">
                                            <select class="form-control selectpicker2 @error("client_id") is-invalid @enderror"
                                                data-size="7" data-live-search="true" data-container="#client_id"
                                                wire:model="client_id">
                                                <option value="" class="text-muted">---Select---</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                
                                            @error("client_id")
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        Plot
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control @error('plot_id') is-invalid @enderror"
                                        data-size="7" data-live-search="true"
                                        wire:model="plot_id">
                                        <option value="" class="text-muted">---Select---</option>
                                        @foreach ($plots as $plot)
                                            <option value="{{ $plot['id'] }}">{{ $plot['area_name'] }}</option>
                                        @endforeach
                                    </select>
    
                                    @error("plot_id")
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
                                                value="{{ old('from_date') }}" name="from_date" wire:model = "from_date" max="9999-12-31"/>
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
                                                value="{{ old('to_date') }}" name="to_date" wire:model = "to_date" max="9999-12-31"/>
                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

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

    @if ($show)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom gutter-b example example-compact w-100">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-title">{{ ucwords(str_replace("_", " ", $type)) }} Report</h3>
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
                        @include('livewire.report.partials.rent')
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
