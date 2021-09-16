<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Transfer Owner Ship</h3>
        </div>
        <form action="submit{{ route('pai.rent.save') }}" method="POST" enctype="multipart/form-data">
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
                        Deal
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                            <select class="form-control selectpicker2 @error('deal_id') is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                wire:model="deal_id" >
                                <option value="" class="text-muted">---Select---</option>
                                <option class="font-weight-bold" disabled>
                                    DEAL ID: &nbsp;&nbsp;&nbsp;
                                    Client Name: &nbsp;&nbsp;&nbsp;
                                    Client Id: &nbsp;&nbsp;&nbsp;
                                    AREA: &nbsp;&nbsp;&nbsp;&nbsp;
                                    PLOT ID:
                                </option>
                                @foreach ($plots as $deal)
                                    <option value="{{ $deal->id }}">
                                        {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $deal->client->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $deal->client->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $deal->plot->area_name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $deal->plot->id }}
                                    </option>
                                @endforeach
                            </select>

                            @error("deal_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Old Client
                        <span class="text-danger">*</span>
                    </label>


                    {{-- <div class="col-md-8">
                        <input type="text" class="form-control  @error('entry_date') is-invalid @enderror"
                            value="{{ old('entry_date') }}" name="entry_date" wire:model="old_client_name" required />
                        @error('entry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="col-md-8">
                        <select class="form-control @error("old_client_id") is-invalid @enderror"
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

    </script>
@endsection
