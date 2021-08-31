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
                            <th scope="col" class="text-muted">Management Fee</th>
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
                                <td>{{ $portfolio->management_fee }}</td>
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
                                    <span style="overflow: visible; position: relative">

                                        <div class="row">

                                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon"
                                                title="Edit details">
                                                <span class="svg-icon svg-icon-md">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path
                                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                            </path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                                rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>

                                            <a href="{{ route('close.portfolio.form', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon"
                                                title="Edit details">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                                <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span
                                            </a>

                                        </div>
                                    </span>


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
