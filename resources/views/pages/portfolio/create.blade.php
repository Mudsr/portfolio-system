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
                    <label class="col-sm-4 col-form-label">Name
                        <span class="text-danger">*</span></label>
                    <input type="text" class="form-control col-md-8" placeholder="Portfolio Name" />
                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                </div>

                <div class="form-group">
                    <label>Management Fee
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" placeholder="Management Fee" min="0"/>
                </div>

                <div class="form-group">
                    <label>Minimum Fee Per Quarter
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" placeholder="Management Fee" min="0"/>
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Fee Calculation Method
                        <span class="text-danger">*</span></label>
                    <select class="form-control" id="exampleSelect1">
                        <option>Flat</option>
                        <option>Proportionate</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Contact Person
                        <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Contact Person Name" />
                </div>

                <div class="form-group">
                    <label>Contact Person
                        <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Contact Person Name" />
                </div>

                <div class="form-group">
                    <label>Email address
                        <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" placeholder="Enter email" />
                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password
                        <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                </div>

                <div class="form-group">
                    <label>Static:</label>
                    <p class="form-control-plaintext text-muted">email@example.com</p>
                </div>
                <div class="form-group">
                    <label for="exampleSelect1">Example select
                        <span class="text-danger">*</span></label>
                    <select class="form-control" id="exampleSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option> 
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelect2">Example multiple select
                        <span class="text-danger">*</span></label>
                    <select multiple="multiple" class="form-control" id="exampleSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="exampleTextarea">Example textarea
                        <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <!--begin: Code-->
                <div class="example-code mt-10">
                    <div class="example-highlight">
                        <pre style="height:400px">
                        </pre>
                    </div>
                </div>
                <!--end: Code-->
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
