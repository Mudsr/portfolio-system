<div class="tab-pane fade" id="in-active" role="tabpanel" aria-labelledby="in-active">
    @if ($inActiveDeals->count() > 0)
        <table class="table table-responsive w-100 d-block d-md-table">
            <thead>
                <tr>
                    <th scope="col" class="text-muted">Deal No</th>
                    <th scope="col" class="text-muted">Portfolio</th>
                    <th scope="col" class="text-muted">Client</th>
                    <th scope="col" class="text-muted">Plot No</th>
                    <th scope="col" class="text-muted">Status</th>
                    <th scope="col" class="text-muted">Type</th>
                    <th scope="col" class="text-muted">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inActiveDeals as $deal)
                    <tr>
                        <th scope="row">{{ $deal->id }}</th>
                        <td>{{ $deal->portfolio->name }}</td>
                        <td>{{ $deal->client->name }}</td>
                        <td>{{ $deal->plot_no }}</td>

                        <td >
                            <span class="label label-lg font-weight-bold label-light-danger label-inline">In-Active</span>
                        </td>

                        <td >
                            @if(!empty($deal->type))
                                <span class="label label-lg font-weight-bold label-light-warning label-inline">
                                    {{ ucfirst(substr($deal->type, 0, 1)) }}
                                </span>
                            @endif
                        </td>

                        <td>
                            <span style="overflow: visible; position: relative">

                                <a href="{{ route('clients.edit', $deal->id) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="View details">
                                    <i class="fas fa-edit text-primary"></i>

                                </a>

                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-muted text-center">No In-Active Deal Exists</h3>
    @endif
</div>
