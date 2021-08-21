@extends('layouts.main')

@section('content')
    <form action="{{ route('deals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('pages.deals.partials.deal-form')
            @include('pages.deals.partials.deal-documents')
        </div>
    </form>
@endsection
