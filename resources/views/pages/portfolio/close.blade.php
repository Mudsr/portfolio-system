@extends('layouts.main')

@section('content')
{{-- {{ dd($errors) }} --}}
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Close Prtfolio</h3>
        </div>
        <form action="{{ route('close.portfolio', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Closing Date
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control @error('closing_date') is-invalid @enderror"
                            value="{{ old('closing_date', $portfolio->closing_date) }}"
                            name="closing_date"
                            required />
                        @error('closing_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <label for="exampleSelect1" class="col-md-3 col-form-label">
                        Closing Reason
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-8">
                        <select class="form-control @error('closing_reason') is-invalid @enderror"
                            name="closing_reason">
                            <option value="" class="text-muted">---Select---</option>
                            <option value="flat" {{ old('fee_calculation_method') == 'flat' ? selected : '' }}>Reason-1</option>
                            <option value="proportioate" {{ old('fee_calculation_method') == 'proportioate' ? selected : '' }}>
                                reason2</option>
                        </select>

                        @error('closing_reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">
                        Closing Remarks
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">

                        <textarea name="closing_remarks" class="form-control @error('closing_remarks') is-invalid @enderror" id="" cols="30" rows="10" required>
                            {{ old('closing_remarks', $portfolio->closing_remarks) }}
                        </textarea>

                        @error('closing_remarks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-md-3 col-form-label">
                        Managment Fee last Claculation Date
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-8">
                        <input type="date"
                            class="form-control @error('management_fee_last_calculated_at') is-invalid @enderror"
                            value="{{ old('management_fee_last_calculated_at', $portfolio->management_fee_last_calculated_at) }}"
                            name="management_fee_last_calculated_at" placeholder="Password" required />
                        @error('management_fee_last_calculated_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>

        </form>
    </div>

@endsection
