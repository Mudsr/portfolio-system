<div class="card card-custom card-stretch gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title text-center">
            <h3 class="card-label text-muted">Pending Tasks</h3>
        </div>
    </div>

    <div class="card-body">
        @if ( isset($pendingTasks) && $pendingTasks->count() > 0)
            <table class="table table-responsive w-100 d-block d-md-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-muted">Task</th>
                        <th scope="col" class="text-muted">Client Name</th>
                        <th scope="col" class="text-muted">Due Date</th>
                        <th scope="col" class="text-muted">Status</th>
                        <th scope="col" class="text-muted">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pendingTasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->client->name }}</td>
                            <td>{{ $task->due_date }}</td>

                            <td>
                                @if (isset($task->completed_at))
                                    <span class="label label-lg font-weight-bold label-light-success label-inline">Done</span>
                                @elseif($task->due_date < now())
                                    <span class="label label-lg font-weight-bold label-light-danger label-inline">Overdue</span>
                                @else
                                    <span class="label label-lg font-weight-bold label-light-warning label-inline">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tasks.complete',[ $task->id, 'rdr' => 'd']) }}" class="btn btn-sm btn-clean btn-icon"
                                    title="Mark Completed">
                                    <i class="fas fa-check text-success"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <h3 class="text-muted text-center">No Pending Task Exists</h3>
        @endif
    </div>
</div>
