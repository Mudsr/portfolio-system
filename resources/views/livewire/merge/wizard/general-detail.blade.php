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
            <option class="font-weight-bold" disabled>
                DEAL ID: &emsp;&emsp;
                CLIENT NAME:&emsp;&emsp;
                CLIENT ID: &emsp;&emsp;
                AREA: &emsp;&emsp;
                PLOT ID: &emsp;&emsp;
            </option>
            @foreach ($deals as $deal)
                <option value="{{ $deal->id }}">
                    {{ $deal->id }} &emsp;&emsp;&emsp;&emsp;&emsp;
                    {{ $deal->client->name }} &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    {{ $deal->client->id }} &emsp;&emsp;&emsp;&emsp;
                    {{ $deal->plot->area_name }} &emsp;&emsp;&emsp;&emsp;
                    {{ $deal->plot->id }}
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
            <option class="font-weight-bold" disabled>
                DEAL ID: &emsp;&emsp;
                CLIENT NAME:&emsp;&emsp;
                CLIENT ID: &emsp;&emsp;
                AREA: &emsp;&emsp;
                PLOT ID: &emsp;&emsp;
            </option>
            @foreach ($dealsFiltered as $deal)
                <option value="{{ $deal->id }}">
                    {{ $deal->id }} &emsp;&emsp;&emsp;&emsp;&emsp;
                    {{ $deal->client->name }} &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    {{ $deal->client->id }} &emsp;&emsp;&emsp;&emsp;
                    {{ $deal->plot->area_name }} &emsp;&emsp;&emsp;&emsp;
                    {{ $deal->plot->id }}
                </option>
            @endforeach

        </select>

        @error("deal2")
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
            value="{{ old('entry_date') }}" name="entry_date" required />
        @error('entry_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
