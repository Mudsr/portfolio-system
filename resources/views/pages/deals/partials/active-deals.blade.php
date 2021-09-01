<div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active">
    @if ($activeDeals->count() > 0)
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
                @foreach ($activeDeals as $deal)
                    <tr>
                        <th scope="row">{{ $deal->id }}</th>
                        <td>{{ $deal->portfolio->name }}</td>
                        <td>{{ $deal->client->name }}</td>
                        <td>{{ $deal->plot_no }}</td>
                        <td >
                            <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                        </td>

                        <td >
                            @if(!empty($deal->type))
                                <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                    {{ ucfirst(substr($deal->type, 0, 1)) }}
                                </span>
                            @endif
                        </td>

                        <td>
                            <span style="overflow: visible; position: relative">

                                <a href="{{ route('deal.renew', $deal->id) }}"
                                    class="btn btn-sm btn-clean btn-icon" title="Renew">
                                    <i class="flaticon-refresh text-success"></i>
                                </a>

                                <a href="{{ route('clients.edit', $deal->id) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="View details">
                                    <i class="fas fa-edit text-primary"></i>

                                </a>

                                <a href="{{ route('close.portfolio.form', $deal->id) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="Close Deal">
                                    <i class="fas fa-times text-warning"></i>
                                </a>


                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-muted text-center">No Active Deal Exists</h3>
    @endif

</div>
