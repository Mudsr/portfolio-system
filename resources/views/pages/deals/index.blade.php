@extends('layouts.main')

@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Deals</h3>
            </div>
            <div class="card-toolbar">

                <a href="{{ route('deals.create') }}" class="btn btn-primary font-weight-bolder">
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

            @forelse ($deals as $deal)
                <table class="table tale-responsive">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted">Deal No</th>
                            <th scope="col" class="text-muted">Portfolio</th>
                            <th scope="col" class="text-muted">Client</th>
                            <th scope="col" class="text-muted">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $deal->id }}</th>
                            <td>{{ $deal->client->name }}</td>
                            <td>{{ $portfolio->portolio->name }}</td>
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

                                    <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"
                                        title="Edit details"> <span class="svg-icon svg-icon-md">
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
                                            </svg> </span> </a>
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"
                                        title="Delete">
                                        <span class="svg-icon svg-icon-md ">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>

                                    {{-- <span class="svg-icon svg-icon-warning"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Stop.svg--> --}}
                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Stop.svg-->
                                        <a href="{{ route('close.portfolio.form', $portfolio->id) }}" class="btn btn-sm btn-clean btn-icon mr-2"
                                            title="Edit details">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @empty
                <h3 class="text-muted text-center">No Portfolio Exists</h3>
            @endforelse
        </div>
    </div>
@endsection
