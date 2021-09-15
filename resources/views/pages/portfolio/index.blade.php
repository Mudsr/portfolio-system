@extends('layouts.main')

@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Portfolios</h3>
            </div>
            <div class="card-toolbar">

                <a href="{{ route('portfolio.create') }}" class="btn btn-primary font-weight-bolder">
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
                    Create Portfolio
                </a>
            </div>
        </div>
        <div class="card-body">

            @if ($portfolios->count() > 0)
                <table class="table table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted">Name</th>
                            {{-- <th scope="col" class="text-muted">Management Fee</th> --}}
                            <th scope="col" class="text-muted">Fee Per Quarter</th>
                            <th scope="col" class="text-muted">Fee Calculation method</th>
                            <th scope="col" class="text-muted">Contact Person</th>
                            <th scope="col" class="text-muted">Contact Email</th>
                            <th scope="col" class="text-muted">Agreement Date</th>
                            <th scope="col" class="text-muted">Agreement Expiry</th>
                            <th scope="col" class="text-muted">Status</th>
                            <th scope="col" class="text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{ $portfolio->name }}</th>
                                {{-- <td>{{ $portfolio->management_fee }}</td> --}}
                                <td>{{ $portfolio->minimum_fee_per_quarter }}</td>
                                <td>{{ $portfolio->fee_calculation_method }}</td>
                                <td>{{ $portfolio->contact_person }}</td>
                                <td>{{ $portfolio->contact_email }}</td>
                                <td>{{ $portfolio->agreement_date }}</td>
                                <td>{{ $portfolio->agreement_expiry }}</td>
                                <td >
                                    @if ($portfolio->isClosed())
                                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Closed</span>
                                    @else
                                        <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon"
                                            title="Edit details">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>

                                        <a href="{{ route('close.portfolio.form', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon"
                                            title="Close Portfolio">
                                            <i class="fas fa-times text-warning"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-muted text-center">No Portfolio Exists</h3>
            @endif

        </div>
    </div>
@endsection
