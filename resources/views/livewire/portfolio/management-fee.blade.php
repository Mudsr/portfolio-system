<div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">
            Management Fee Range
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            @foreach ($ranges as $key => $range)
                <div class="row mb-5">
                    <div class="col-md-3">
                        <input type="number" class="form-control @error('management_fee') is-invalid @enderror"
                        placeholder="From" value="{{ old('management_fee') }}" name="from[]" wire:model="from.{{ $range }}" min="0"
                        required />
                        @error('management_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <input type="number" class="form-control @error('management_fee') is-invalid @enderror"
                        placeholder="To" value="{{ old('management_fee') }}" name="to[]" wire:model="to.{{ $range }}" min="0"
                        required />
                        @error('management_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <input type="number" class="form-control @error('management_fee') is-invalid @enderror"
                        placeholder="Percentage" value="{{ old('management_fee') }}" name="percentage[]" wire:model="percentage.{{ $range }}" min="0"
                        step="0.0001" required />
                        @error('management_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if(!$loop->last)
                        <div class="col-md-3">
                            <button class="btn btn-danger"  wire:click.prevent="removeField({{ $key }})">Remove</button>
                        </div>
                    @endif

                    @if($loop->last)
                        <div class="col-md-3">
                            <button class="btn btn-primary"  wire:click.prevent="addManagementFeeRangeFields">Add More</button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
