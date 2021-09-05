<div>
    <div class="card card-custom">
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
            {{-- @if ($tasks->count() > 0) --}}
                <table class="table table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted">Portfolio</th>
                            <th scope="col" class="text-muted">Client</th>
                            <th scope="col" class="text-muted">Plot</th>
                            <th scope="col" class="text-muted">Status</th>
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
                                @if (isset($task->completed_at))
                                    <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                                @elseif($task->due_date > now())
                                    <span class="label label-lg font-weight-bold label-light-danger label-inline">Overdue</span>
                                @else
                                    <span class="label label-lg font-weight-bold label-light-warning label-inline">Pending</span>
                                @endif
                            </td>
                            
                            <td>
                                <span style="overflow: visible; position: relative">

                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-clean btn-icon"
                                        title="View details">
                                        <i class="fas fa-eye text-primary"></i>

                                    </a>

                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{-- @else
                <h3 class="text-muted text-center">No Renewal Exists</h3>
            @endif --}}
        </div>
    </div>
</div>
