<div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Expiry Report</h3>
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
                                            <option class="text-muted" value="default">---Select---</option>
                                            {{-- <option value="all">All</option> --}}
                                            <option value="pai">PAI</option>
                                            <option value="fire_insurance">Fire Insurance</option>
                                            <option value="power_of_attorney">Power of Attorney</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @if ($type == 'by_date_range') --}}
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
                        {{-- @endif --}}
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

    @switch($this->type)
    @case("fire_insurance")
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
                                        <a class="dropdown-item" data-toggle="tab" wire:click="fiexportExcel" >Export As Excel</a>
                                        <a class="dropdown-item" data-toggle="tab" wire:click="fiexportPdf">Export As PDF</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('livewire.report.partials.fiexpiry')
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
    @break

    @case("pai")


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
                                    <a class="dropdown-item" data-toggle="tab" wire:click="paiexportExcel" >Export As Excel</a>
                                    <a class="dropdown-item" data-toggle="tab" wire:click="paiexportPdf">Export As PDF</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.report.partials.paiexpiry')
                    
                </div>
            </div>
        </div>
    </div>
@endif
     @break

     @case("power_of_attorney")

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
                                     <a class="dropdown-item" data-toggle="tab" wire:click="poaexportExcel" >Export As Excel</a>
                                     <a class="dropdown-item" data-toggle="tab" wire:click="poaexportPdf">Export As PDF</a>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
 
                 <div class="card-body">
                     @include('livewire.report.partials.poaexpiry')
                     
                 </div>
             </div>
         </div>
     </div>
 @endif


     @break

     @default
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
                    @include('livewire.report.partials.expiry')
                    
                </div>
            </div>
        </div>
    </div>
@endswitch
</div>
