<div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Report</h3>
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
                                        <select class="form-control selectpicker2 @error('type') is-invalid @enderror"
                                            wire:model="type" name="type">
                                            <option class="text-muted">---Select---</option>
                                            <option value="plot_addition"> Plot Addition Report</option>
                                            <option value="plot_closure"> Plot Closure Report</option>
                                            <option value="merge"> Merge Report</option>
                                            <option value="split"> Split Report</option>
                                            <option value="transfer"> Transfer Report</option>
                                        </select>
                                        @error('type')
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
                                                value="{{ old('from_date') }}" name="from_date" wire:model = "from_date" />
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
                                                value="{{ old('to_date') }}" name="to_date" wire:model = "to_date" />
                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_7_3">Export As Excel</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_7_3">Export As PDF</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($deals->count() > 0)
                            @switch($type)
                                @case('plot_closure')
                                    @include('livewire.report.partials.plot-addition')
                                    @break
                                @case('merge')
                                    @include('livewire.report.partials.plot-closure')
                                    @break
                                @case('split')
                                    @include('livewire.report.partials.plot-addition')
                                    @break
                                @case('transfer')
                                    @include('livewire.report.partials.plot-addition')
                                    @break
                                @default
                                    @include('livewire.report.partials.plot-addition')
                                    @break
                            @endswitch
                        @else
                            <h3 class="text-muted text-center">No Data Available</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

