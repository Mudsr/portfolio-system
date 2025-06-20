<div class="tab-pane fade @if($tab=='in-active') show active @endif" id="in-active" role="tabpanel" aria-labelledby="in-active">
    <div class="mb-7">
        <div class="row align-items-center">
            <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">

                        <div class="col-md-6 ">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..."
                                value="{{ old('inActive_deals_search_query', request()->t== '!a' ? request()->q:'') }}"
                                name="inActive_deals_search_query" id="inActive_deals_search_query" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>

                        </div>
                        <div class="col-md-6 ">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold" id="inActive_deal_search_btn">Search</a>
                            <a href="{{ route('deals.index') }}" class="btn btn-light-info px-6 font-weight-bold" >Clear Search Filter</a>
                        </div>

                </div>

            </div>

        </div>
    </div>
    @if ($inActiveDeals->count() > 0)

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
                @foreach ($inActiveDeals as $deal)
                    <tr>
                        <th scope="row">{{ $deal->id }}</th>
                        <td>{{ $deal->portfolio->name }}</td>
                        <td>{{ $deal->client->name }}</td>
                        <td>{{ $deal->client->id }}</td>
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
