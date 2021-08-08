@extends('layouts.main')

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Update Client</h3>
        </div>

        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Email
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control col-md-8" placeholder="someone@example.com" name="email" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Address:
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="Address" name="Address" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Telephone
                        <span class="text-danger">*</span>
                    </label>
                    <input type="tel" class="form-control col-md-8" placeholder="Telephone" name="telephone" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        ID Type
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="ID Type" name="id_type" min="0" required/>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        ID No
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control col-md-8" placeholder="ID No" name="id_no" min="0" required/>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        ID Expiry Date
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control col-md-8" name="id_expiry" placeholder="Password" required/>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
