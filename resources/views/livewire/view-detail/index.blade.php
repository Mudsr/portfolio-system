<div>
    <div class="card card-custom mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label font-weight-bold">
                            Filter By:
                        </label>
                        <div class="col-md-5">
                            <div wire:ignore id="filter_by">
                                <select class="form-control selectpicker2 @error('filter_by') is-invalid @enderror"
                                    wire:model="filter_by" data-container="#filter_by">
                                    <option value="portfolio">Portfolio </option>
                                    <option value="client">Client </option>
                                    <option value="by_date">Date Range </option>
                                    <option value="documents"> Documents List expiring </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($filter_by == 'portfolio' )
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label font-weight-bold">
                                Portfolio:
                            </label>

                            <div class="col-md-5">
                                <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
                                    wire:model="portfolio_id" data-container="#portfolio_id">
                                    <option value="portfolio"> Deals by Portfolio </option>
                                    <option value="client"> Deals by Client </option>
                                    <option value="by_date"> Deals by Date Range </option>
                                    <option value="documents"> Documents List expiring </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($filter_by == 'client' )
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label font-weight-bold">
                                Client:
                            </label>

                            <div class="col-md-5">
                                <select class="form-control selectpicker2 @error('client_id') is-invalid @enderror"
                                    wire:model="client_id" data-container="#client_id">

                                </select>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($filter_by == 'by_date' || $filter_by == 'documents' )
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12"> Date Range: </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class='input-group' id='kt_daterangepicker_2'>
                                    <input type='text' class="form-control" wire:mode="date_range" readonly="readonly" placeholder="Select date range" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @include('livewire.view-detail.partials.deals')
</div>
@section('scripts')
    <script src="{{ asset('metronic/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}"></script>
@endsection
