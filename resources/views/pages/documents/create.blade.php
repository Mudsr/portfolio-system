@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Prtfolio</h3>
        </div>

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="Document Name" name="name" required/>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Related To
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control col-md-8" name="related_to">
                        <option value="" class="text-muted">---Select---</option>
                        <option value="client">Client</option>
                        <option value="building">Building</option>
                        <option value="contract">Contract</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Department
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control col-md-8" name="department">
                        <option value="" class="text-muted">---Select---</option>
                        <option value="client">Department1</option>
                        <option value="building">Department2</option>
                        <option value="contract">Department2</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Documnet
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control col-md-8" name="document" required/>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>

    </div>

@endsection
