<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Merge</h3>
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
                        Deal 1
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                            <select class="form-control @error('deal1') is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                wire:model="deal1" >
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
                                    wire:model="deal2" >
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


            </div>

            {{-- <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div> --}}

        </form>
    </div>

    <div class="row">
        @if (!empty($plot1))
            @include('livewire.merge.partials.plot', ['plot' => $plot1, 'name' => 'Plot 1'])
        @endif

        @if (!empty($plot2))
            @include('livewire.merge.partials.plot', ['plot' => $plot2, 'name' => 'Plot 2'])
        @endif
    </div>
</div>
@section('scripts')
<script>
    $('.selectpicker2').
        selectpicker().
        on('hide.bs.select', function() {
            // fix dropup arrow icon on hide
            $(this).closest('.bootstrap-select').removeClass('dropup');
        }).
        siblings('.dropdown-toggle').
        attr('title', Plugin.getOption('translate.toolbar.pagination.items.default.select'));
</script>
@endsection
