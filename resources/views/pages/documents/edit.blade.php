@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Prtfolio</h3>
        </div>

        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Name:
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="Portfolio Name" />
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Management Fee
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Management Fee" min="0"/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Minimum Fee Per Quarter
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Management Fee" min="0"/>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Fee Calculation Method
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control col-md-8" id="exampleSelect1">
                        <option value="" class="text-muted">---Select---</option>
                        <option value="flat">Flat</option>
                        <option value="proportioate">Proportionate</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Person
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="Contact Person Name" />
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Number
                        <span class="text-danger">*</span>
                    </label>
                    <input type="tel" class="form-control col-md-8" placeholder="Contact Person Name" />
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Email address
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control col-md-8" placeholder="Enter email" />
                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Date
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" id="exampleInputPassword1" placeholder="Password" />
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Expiry
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" id="exampleInputPassword1" placeholder="Password" />
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Expiry
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control col-md-8" id="exampleInputPassword1" placeholder="Password" />
                </div>


            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
