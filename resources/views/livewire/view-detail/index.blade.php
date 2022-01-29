<div>
    <div class="card card-custom mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label font-weight-bold">
                            Filter By:
                        </label>
                        <div class="col-md-8">
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

                            <div class="col-md-8">
                                <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
                                    wire:model="portfolio_id" data-container="#portfolio_id">
                                    @foreach ($portfolios as $portfolio)
                                        <option value="{{ $portfolio->id }}"> {{ $portfolio->name }} </option>
                                    @endforeach
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
                                    <option> ---Select Client--- </option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"> {{ $client->name }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($filter_by == 'by_date' || $filter_by == 'documents' )
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        From:
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control  @error('from_date') is-invalid @enderror"
                                            value="{{ old('from_date') }}" name="from_date" wire:model="from_date" required max="9999-12-31"/>
                                        @error('from_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">
                                        To:
                                    </label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control  @error('to_date') is-invalid @enderror"
                                            value="{{ old('to_date') }}" name="to_date" wire:model="to_date" required max="9999-12-31"/>

                                        @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.sent', (message, component) => {
                $('.selectpicker2').selectpicker('destroy')
            })
            Livewire.hook('message.processed', (message, component) => {
                jQuery(document).ready(function() {
                    KTBootstrapDaterangepicker.init();
                });
            })
        });

    </script>
@endsection
