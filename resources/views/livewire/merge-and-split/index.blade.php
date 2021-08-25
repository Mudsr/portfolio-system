<div>
    {{-- <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tasks</h3>
            </div>
            <div class="card-toolbar">

                <a href="{{ route('tasks.create') }}" class="btn btn-primary font-weight-bolder">
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
                    Create Task
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-responsive w-100 d-block d-md-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-muted">Portfolio</th>
                        <th scope="col" class="text-muted">Client</th>
                        <th scope="col" class="text-muted">Plot</th>
                        <th scope="col" class="text-muted">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->portfolio->name }}</td>
                            <td>{{ $task->client->name }}</td>
                            <td>{{ $task->plot->area_name }}</td>
                            <td>
                                <span style="overflow: visible; position: relative">
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                        <span class="svg-icon svg-icon-md ">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
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


                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div> --}}

    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">Merge & Split</h3>
            </div>
        </div>
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#merge">
                            {{-- <span class="nav-icon"><i class="flaticon2-chat-1"></i></span> --}}
                            <span class="nav-text">Merge</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#split">
                            {{-- <span class="nav-icon"><i class="flaticon2-drop"></i></span> --}}
                            <span class="nav-text">Split</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-hover-light-primary btn-icon btn-sm" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor "></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="merge" role="tabpanel"
                    aria-labelledby="kt_tab_pane_1_4">

                </div>
                <div class="tab-pane fade" id="split" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                    split
                </div>

            </div>
        </div>
    </div>

</div>
