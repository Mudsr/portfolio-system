<div>
   <div class="row">
       <div class="col-md-5">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title text-center">
                    <h3 class="card-label text-muted">Pending Tasks</h3>
                </div>
            </div>

            <div class="card-body">
                @if ($tasks->count() > 0)
                    <table class="table table-responsive w-100 d-block d-md-table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-muted">Task</th>
                                <th scope="col" class="text-muted">Client Name</th>
                                <th scope="col" class="text-muted">Due Date</th>
                                <th scope="col" class="text-muted">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $task)

                            @endforeach

                        </tbody>
                    </table>
                @else
                    <h3 class="text-muted text-center">No Pending Task Exists</h3>
                @endif
            </div>
        </div>
       </div>

       <div class="col-md-7">
           <div class="row">
               <div class="col-md-12">
                   <div class="card card-custom card-stretch gutter-b">
                       <div class="card-header flex-wrap border-0 pt-6 pb-0">
                           <div class="card-title text-center">
                               <h3 class="card-label text-primary">Up coming Renewals</h3>
                           </div>
                       </div>

                       <div class="card-body">
                           {{-- @if ($tasks->count() > 0) --}}
                               <table class="table table-responsive w-100 d-block d-md-table">
                                   <thead>
                                       <tr>
                                           <th scope="col" class="text-muted">Client No</th>
                                           <th scope="col" class="text-muted">Contract No</th>
                                           <th scope="col" class="text-muted">Document Type</th>
                                           <th scope="col" class="text-muted">Due Date</th>
                                       </tr>
                                   </thead>
                                   <tbody>

                                   </tbody>
                               </table>
                           {{-- @else
                               <h3 class="text-muted text-center">No Renewal Exists</h3>
                           @endif --}}
                       </div>
                   </div>
               </div>
                <div class="col-md-12">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title text-center">
                                <h3 class="card-label text-danger">Alerts</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- @if ($tasks->count() > 0) --}}
                                <table class="table table-responsive w-100 d-block d-md-table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-muted">Client No</th>
                                            <th scope="col" class="text-muted">Contract No</th>
                                            <th scope="col" class="text-muted">Document Type</th>
                                            <th scope="col" class="text-muted">Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            {{-- @else
                                <h3 class="text-muted text-center">No Renewal Exists</h3>
                            @endif --}}
                        </div>
                    </div>
                </div>
           </div>

       </div>
   </div>
</div>
