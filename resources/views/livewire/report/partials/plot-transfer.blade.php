<table class="table table-responsive w-100 d-block d-md-table">
    <thead>
        <tr>
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">Deal No</th>
            <th scope="col" class="text-muted">Trx Date</th>
            <th scope="col" class="text-muted">Client Id From</th>
            <th scope="col" class="text-muted">Client Name From</th>
            <th scope="col" class="text-muted">Client Id To</th>
            <th scope="col" class="text-muted">Client Name To</th>
            <th scope="col" class="text-muted">Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Block</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($transfers as $transfer)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $transfer->plot->deal->id }}</td>
                <td>{{ $transfer->entry_date }}</td>
                <td>{{ $transfer->old_client_id }}</td>
                <td>{{ $transfer->oldClient->name }}</td>
                <td>{{ $transfer->new_client_id }}</td>
                <td>{{ $transfer->newClient->name }}</td>
                <td>{{ $transfer->plot->deal->plot_no }}</td>
                <td>{{ $transfer->plot->area_name }}</td>
                <td>{{ $transfer->plot->block }}</td>
                <td>{{ $transfer->plot->property_value }}</td>
                <td>{{ $transfer->plot->finance_amount }}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        {{-- <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td class="font-weight-bold" > Total = {{ $deals->sum('plot.property_value') }}</td>
            <td class="font-weight-bold" >Total = {{ $deals->sum('plot.finance_amount') }}</td>
        </tr> --}}
    </tbody>
</table>
