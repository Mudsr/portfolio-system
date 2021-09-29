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

@section('scripts')
    <script>
        $(function(){
            $('#client_select').change(function(){
                var selected = $(this).find('option:selected');
                var clientId = selected.val();
                var clientName = selected.attr('data-name');
                $('#client_name').val(clientName);
                $('#issued_to').val(clientName);
                $('#clientId').val(clientId);
            });
        });
    </script>
@endsection
