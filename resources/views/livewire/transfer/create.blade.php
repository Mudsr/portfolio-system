<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Transfer Owner Ship</h3>
        </div>
        <form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Portfolio
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <div wire:ignore id="portfolio_id">
                            <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
                            wire:model="portfolio_id" data-container="#portfolio_id">
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($portfolios as $portfolio)
                                    <option value="{{ $portfolio->id }}">{{ $portfolio->name }}</option>
                                @endforeach

                            </select>

                            @error('portfolio_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Plot
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                            <select class="form-control selectpicker2 @error('plot_id') is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                wire:model="plot_id" >
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($plots as $deal)
                                    <option value="{{ $deal->id }}">
                                        DEAL ID: {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                                        CLIENT NAME: {{ $deal->client->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                                        CLIENT ID: {{ $deal->client->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                                        AREA: {{ $deal->plot->area_name }} &nbsp;&nbsp;&nbsp;&nbsp;
                                        PLOT ID: {{ $deal->plot->id }}
                                    </option>
                                @endforeach
                            </select>

                            @error("plot_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Old Client
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        {{-- <div wire:ignore id="old_client_id"> --}}
                            <select class="form-control  @error("old_client_id") is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                wire:model="old_client_id" disabled>
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $old_client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>

                            @error("old_client_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        {{-- </div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        New Client
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        {{-- <div wire:ignore id="new_client_id"> --}}

                            <select class="form-control selectpicker2 @error("new_client_id") is-invalid @enderror"
                                data-size="7" data-live-search="true" data-container="#new_client_id"
                                wire:model="new_client_id">
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($newClients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>

                            @error("new_client_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        {{-- </div> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Entry Date
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control  @error('entry_date') is-invalid @enderror"
                            value="{{ old('entry_date') }}" name="entry_date" wire:model="entry_date" required />
                        @error('entry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>
</div>
@section('scripts')
    <script>
        intializeSelectPicker()

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.sent', (message, component) => {
                $('.selectpicker2').selectpicker('destroy')
            })
            Livewire.hook('message.processed', (message, component) => {
                intializeSelectPicker();

            })
        });

        function intializeSelectPicker() {
            $('.selectpicker2').selectpicker().on('hide.bs.select', function() {
                // fix dropup arrow icon on hide
                $(this).closest('.bootstrap-select').removeClass('dropup');
            });
        }

    </script>
@endsection
