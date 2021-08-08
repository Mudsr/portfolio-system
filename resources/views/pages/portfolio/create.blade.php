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
                    <input type="text" class="form-control col-md-8" placeholder="Portfolio Name" name="name" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Management Fee
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Management Fee" name="managment_fee" min="0" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Minimum Fee Per Quarter
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control col-md-8" placeholder="Minimum Fee Per Quarter" name="minimum_fee_per_quarter" min="0" required/>
                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Fee Calculation Method
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control col-md-8" name="fee_calculation_method">
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
                    <input type="text" class="form-control col-md-8" placeholder="Contact Person Name" name="contact_person" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Number
                        <span class="text-danger">*</span>
                    </label>
                    <input type="tel" class="form-control col-md-8" placeholder="Contact Person Number" name="contact_number" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Contact Email
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control col-md-8" placeholder="Enter email" name="contact_email" required/>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Date
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="agreement_date" placeholder="Password" required/>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Portfolio Agreement Expiry
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="agreement_expiry" placeholder="Password" required/>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Agreement Documnet
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control col-md-8" name="agreement_document" placeholder="Password" required/>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
