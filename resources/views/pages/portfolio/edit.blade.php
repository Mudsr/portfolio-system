@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Create Prtfolio</h3>
        </div>

        <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Update Effective From
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="update_effective_from" placeholder="Password" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        New Management Fee
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Management Fee" min="0"/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        New Minimum Fee Per Quarter
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Management Fee" min="0"/>
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
                    <input type="tel" class="form-control col-md-8" placeholder="Contact Person Number" />
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Email
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control col-md-8" placeholder="Enter email" />
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        New Portfolio Agreement Date
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="agreement_date" placeholder="Password" required/>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        New Portfolio Agreement Expiry
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="agreement_expiry" placeholder="Password" required/>
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
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
