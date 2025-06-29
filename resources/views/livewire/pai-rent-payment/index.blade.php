<div>
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Pai Rent Payment</h3>
            </div>
            <div class="card-toolbar">

                <a href="{{ route('pai.rent.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                    Pai Rent Payment
                </a>
            </div>
        </div>

        <div class="card-body">
            @if ($rents->count() > 0)
                <table class="table table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted">client ID</th>
                            <th scope="col" class="text-muted">Client Name</th>
                            <th scope="col" class="text-muted">Rent Amount</th>
                            <th scope="col" class="text-muted">From</th>
                            <th scope="col" class="text-muted">To</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $rent)
                            <tr>
                                <td>{{ $rent->client->id }}</td>
                                <td>{{ $rent->client->name }}</td>
                                <td>{{ $rent->rent_amount }}</td>
                                <td>{{ $rent->from_date }}</td>
                                <td>{{ $rent->to_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-muted text-center">No Pai Rent Exists</h3>
            @endif
        </div>
    </div>
</div>
