<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Client</h3>
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
                        <select class="form-control selectpicker2    @error('portfolio_id') is-invalid @enderror"
                           wire:model="portfolio_id">
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
                        Client
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control selectpicker2 @error("client_id") is-invalid @enderror"
                            data-size="7" data-live-search="true"
                            wire:model="client_id">
                            <option value="" class="text-muted">---Select---</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>

                        @error("client_id")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if ($client_id)
                    <div class="form-group row">
                        <label for="exampleSelect1" class="col-md-3 col-form-label">
                            Plot
                            <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-8">
                            <select class="form-control selectpicker2 @error('plot_id') is-invalid @enderror"
                                data-size="7" data-live-search="true"
                                wire:model="plot_id">
                                <option value="" class="text-muted">---Select---</option>
                                @foreach ($plots as $plot)
                                    <option value="{{ $plot['id'] }}">{{ $plot['area_name'] }}</option>
                                @endforeach
                            </select>

                            @error("plot_id")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif


                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Description
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id=""cols="30" rows="5">

                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Due Date
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date"wire:model="due_date" class="form-control @error('due_date') is-invalid @enderror" id="">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Document Type
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control selectpicker2    @error('document_type') is-invalid @enderror"
                           wire:model="document_type">
                            <option value="" class="text-muted">---Select---</option>
                            <option value="client" {{ old('related_to')=='client' ? 'selected' :'' }} >Client</option>
                            <option value="building" {{ old('related_to')=='building' ? 'selected' :'' }} >Building</option>
                            <option value="contract" {{ old('related_to')=='contract' ? 'selected' :'' }} >Contract</option>
                        </select>

                        @error('document_type')
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
@push('scripts')
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
@endpush
