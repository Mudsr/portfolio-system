<div class="card card-custom card-stretch gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title text-center">
            <h3 class="card-label text-primary">Up coming Renewals</h3>
        </div>

        <div class="card-toolbar">

            <select class="form-control" wire:model="days" >
                    <option value="3"> 3 Days </option>
                    <option value="7"> 7 Days </option>
                    <option value="15"> 15 Days </option>
            </select>

        </div>

    </div>

    <div class="card-body">
        @if (isset($plots))
            <table class="table table-responsive w-100 d-block d-md-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-muted">Client No</th>
                        <th scope="col" class="text-muted">Contract No</th>
                        <th scope="col" class="text-muted">Document Type</th>
                        <th scope="col" class="text-muted">Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plots as $plot)
                        @if ($types = $plot->checkDocumentExpiry($days))
                            @foreach ($types as $type)
                                <tr>
                                    <td>{{ $plot->deal->client->id }}</td>
                                    <td>{{ $plot->deal->id }}</td>
                                    <td>{{ ucwords(str_replace("_", " ", $type)) }}</td>
                                    <td>{{ $plot->getMedia($type)->last()->custom_properties['expiry_date']; }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-muted text-center">No Renewal Available</h3>
        @endif

    </div>
</div>
