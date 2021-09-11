<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Vew Details</h3>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-responsive w-100 d-block d-md-table">
            <thead>
                <tr>
                    <th scope="col" class="text-muted">Deal No</th>
                    <th scope="col" class="text-muted">Portfolio</th>
                    <th scope="col" class="text-muted">Client Name</th>
                    <th scope="col" class="text-muted">Client No</th>
                    <th scope="col" class="text-muted">Plot No</th>
                    <th scope="col" class="text-muted">Status</th>
                    <th scope="col" class="text-muted">Type</th>
                    <th scope="col" class="text-muted">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deals as $deal)
                    <tr>
                        <th scope="row">{{ $deal->id }}</th>
                        <td>{{ $deal->portfolio->name }}</td>
                        <td>{{ $deal->client->name }}</td>
                        <td>{{ $deal->client->id }}</td>
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

                                <a href="{{ route('deals.show', $deal->id) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="View details">
                                    <i class="fas fa-eye text-primary"></i>

                                </a>

                                <a href="{{ route('deal.close.form', $deal->id) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="Close Deal">
                                    <i class="fas fa-times text-warning"></i>
                                </a>


                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
