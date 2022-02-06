@extends('layouts.main')




@section('content')
    {{-- @livewire('pai-rent-payment.create') --}}
@php
    use App\Models\Deal;
@endphp
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">PAI Rent</h3>
        </div>
        <livewire:pai-rent-payment :clients="$clients" :deals="$deals">
    </div>
@endsection
@section('scripts')
    <script>
        $(function(){
            $('#client_select').change(function(){
                var selected = $(this).find('option:selected');
                var clientId = selected.val();
                $('#client_id_value').val(clientId);
            });
        });
    </script>
@endsection
