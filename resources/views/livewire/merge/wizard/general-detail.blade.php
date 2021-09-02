<div class="form-group row">
    <label class="col-md-3 col-form-label">
        Portfolio
        <span class="text-danger">*</span>
    </label>

    <div class="col-md-8">
        <select class="form-control selectpicker2 @error('portfolio_id') is-invalid @enderror"
            wire:model="portfolio_id" name="portfolio_id">
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

<div class="form-group row">
    <label for="exampleSelect1" class="col-md-3 col-form-label">
        Deal 1
        <span class="text-danger">*</span>
    </label>

    <div class="col-md-8">
        <select class="form-control selectpicker2 @error('deal1') is-invalid @enderror"
            data-size="7" data-live-search="true"
            wire:model="deal1" name="deal1">
            <option value="" class="text-muted">---Select---</option>
            @foreach ($deals as $deal)
                <option value="{{ $deal->id }}">
                    DEAL ID: {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                    CLIENT NAME: {{ $deal->client->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                    CLIENT ID: {{ $deal->client->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                    AREA: {{ $deal->plot->area_name }} &nbsp;&nbsp;&nbsp;&nbsp;
                    PLOT ID: {{ $deal->plot->id }}
                </option>
            @endforeach
        </select>

        @error("deal1")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="exampleSelect1" class="col-md-3 col-form-label">
        Deal 2
        <span class="text-danger">*</span>
    </label>

    <div class="col-md-8">
        <select class="form-control selectpicker2 @error('deal2') is-invalid @enderror"
            data-size="7" data-live-search="true"
            wire:model="deal2" name="deal2">
            <option value="" class="text-muted">---Select---</option>
            @foreach ($dealsFiltered as $deal)
                <option value="{{ $deal->id }}">
                    DEAL ID: {{ $deal->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                    CLIENT NAME: {{ $deal->client->name }} &nbsp;&nbsp;&nbsp;&nbsp;
                    CLIENT ID: {{ $deal->client->id }} &nbsp;&nbsp;&nbsp;&nbsp;
                    AREA: {{ $deal->plot->area_name }} &nbsp;&nbsp;&nbsp;&nbsp;
                    PLOT ID: {{ $deal->plot->id }}
                </option>
            @endforeach
        </select>

        @error("deal2")
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
