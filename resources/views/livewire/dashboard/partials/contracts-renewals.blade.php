<div class="card card-custom card-stretch gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title text-center">
            <h3 class="card-label text-primary">Up coming Contracts Renewals</h3>
        </div>

        <div class="card-toolbar">

            <select class="form-control" wire:model="contracts_renewal_filter">
                <option value="7"> 7 Days </option>
                <option value="15"> 15 Days </option>
                <option value="30"> 1 Month </option>
            </select>

        </div>

    </div>

    <div class="card-body">
        @if (isset($contractRenewals))
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
                    @foreach ($contractRenewals as $plot)
                        @foreach ($plot->media as $media)
                            <tr>
                                <td>{{ $plot->deal->client->id }}</td>
                                <td>{{ $plot->deal->id }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $media->collection_name)) }}</td>
                                <td>{{ $plot->getMedia($media->collection_name)->last()->custom_properties['expiry_date'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-muted text-center">No Renewal Available</h3>
        @endif

    </div>
</div>
