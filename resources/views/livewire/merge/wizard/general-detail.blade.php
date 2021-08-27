<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Portfolio
        <span class="text-danger">*</span>
    </label>

    <div class="col-md-8">
        <div wire:ignore id="portfolio_id">
            <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
            wire:model="portfolio_id" data-container="#portfolio_id" name="portfolio_id">
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
        Deal 1
        <span class="text-danger">*</span>
    </label>

    <div class="col-md-8">
            <select class="form-control @error('deal1') is-invalid @enderror"
                data-size="7" data-live-search="true"
                wire:model="deal1" name="deal1">
                <option value="" class="text-muted">---Select---</option>
                @foreach ($deals as $deal)
                    <option value="{{ $deal->id }}">{{ $deal->id }}</option>
                @endforeach
            </select>

            @error("deal1")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
    </div>
</div>

@if ($deal1)
    <div class="form-group row">
        <label for="exampleSelect1" class="col-md-3 col-form-label">
            Deal 2
            <span class="text-danger">*</span>
        </label>

        <div class="col-md-8">
                <select class="form-control @error('deal2') is-invalid @enderror"
                    data-size="7" data-live-search="true"
                    wire:model="deal2" name="deal2">
                    <option value="" class="text-muted">---Select---</option>
                    @foreach ($dealsFiltered as $deal)
                        <option value="{{ $deal->id }}">{{ $deal->id }}</option>
                    @endforeach
                </select>

                @error("deal2")
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
    </div>
@endif
