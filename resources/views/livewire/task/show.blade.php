<div>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Task Detail</h3>
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Portfolio:
                </label>

                <div class="col-md-8">
                    <p>{{ $task->portfolio->name ?? 'N/A' }}</p>
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleSelect1" class="col-md-3 col-form-label">
                    Client:
                </label>

                <div class="col-md-8">
                    <p>{{ $task->client->name ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleSelect1" class="col-md-3 col-form-label">
                    Plot:
                </label>

                <div class="col-md-8">
                    <p>{{ $task->plot->area_name?? 'N/A' }}</p>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Description:
                </label>
                <div class="col-md-8">
                    <p>{{ $task->plot->area_name?? 'N/A' }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Due Date:
                </label>
                <div class="col-md-8">
                    <p>{{ $task->plot->due_date?? 'N/A' }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    Document Type:
                </label>

                <div class="col-md-8">
                    <p>{{ $task->plot->document_type?? 'N/A' }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    status:
                </label>

                <div class="col-md-8">
                    @if (isset($task->completed_at))
                        <span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
                    @elseif($task->due_date > now())
                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Overdue</span>
                    @else
                        <span class="label label-lg font-weight-bold label-light-warning label-inline">Pending</span>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
