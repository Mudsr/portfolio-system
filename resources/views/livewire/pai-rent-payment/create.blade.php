<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">PAI Rent</h3>
        </div>
        <form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                {{-- <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Plot No
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
                                PLOT No:
                            </option>
                            @foreach ($plots as $deal)
                                <option value="{{ $deal->id }}">
                                    {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->client->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->client->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->plot->area_name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->plot_no }}
                                </option>
                            @endforeach
                        </select>

                        @error("deal_id")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Client ID
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control  @error('client_id') is-invalid @enderror"
                            value="{{ old('client_id') }}" name="client_id" wire:model="client_id" disabled />
                        @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Client Name
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control selectpicker2 @error('client_name') is-invalid @enderror"
                            data-size="7" data-live-search="true"
                            wire:model="client_name" wire:bind="client_id" >
                            <option value="" class="text-muted">---Select Client---</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->id }}, {{ $client->name }} </option>
                            @endforeach
                        </select>

                        @error("client_name")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Plot No
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control selectpicker2 @error('deal_id') is-invalid @enderror"
                            data-size="7" data-live-search="true"
                            wire:model="deal_id" >
                            <option value="" class="text-muted">---Select---</option>
                            <option class="font-weight-bold" disabled>
                                DEAL ID: &nbsp;&nbsp;&nbsp;
                                Plot Id: &nbsp;&nbsp;&nbsp;&nbsp;
                                PLOT No:
                            </option>
                            @foreach ($deals as $deal)
                                <option value="{{ $deal->id }}">
                                    {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->plot->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $deal->plot_no }}
                                </option>
                            @endforeach
                        </select>

                        @error("deal_id")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Rent Amount
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control  @error('rent_amount') is-invalid @enderror"
                            value="{{ old('rent_amount') }}" name="rent_amount" wire:model="rent_amount" min="0" required />
                        @error('rent_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        From Date
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control  @error('from_date') is-invalid @enderror"
                            value="{{ old('from_date') }}" name="from_date" wire:model="from_date" required />
                        @error('from_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        To Date
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control  @error('to_date') is-invalid @enderror"
                            value="{{ old('to_date') }}" name="to_date" wire:model="to_date" required />
                        @error('to_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Comments
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <textarea name="comments" wire:model="comments" class="form-control" id="" cols="30" rows="10">
                            {{ $comments }}
                        </textarea>
                        @error('comments')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Receipt Voucher
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <input type="date" class="form-control  @error('receipt_voucher') is-invalid @enderror"
                            value="{{ old('receipt_voucher') }}" name="receipt_voucher" wire:model="receipt_voucher" required />
                        @error('receipt_voucher')
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
