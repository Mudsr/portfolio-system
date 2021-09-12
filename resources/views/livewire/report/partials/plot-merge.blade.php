<table class="table table-responsive w-100 d-block d-md-table">
    <thead>
        <tr>
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">Deal No</th>
            <th scope="col" class="text-muted">Trx Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">New Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            <th scope="col" class="text-muted">Old Plot1 No</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            <th scope="col" class="text-muted">Old Plot2 No</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($merges as $merge)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $merge->oldDeals()[0]->id }}</td>
                <td>{{ $merge->entry_date }}</td>
                <td>{{ $merge->mergedDeal->client_id }}</td>
                <td>{{ $merge->mergedDeal->client->name }}</td>
                <td>{{ $merge->mergedDeal->plot_no }}</td>
                <td>{{ $merge->mergedDeal->plot->area_name }}</td>
                <td>{{ $merge->mergedDeal->plot->property_value }}</td>
                <td>{{ $merge->mergedDeal->plot->finance_amount }}</td>
                <td>{{ $merge->oldDeals()[0]->plot_no }}</td>
                <td>{{ $merge->oldDeals()[0]->plot->property_value }}</td>
                <td>{{ $merge->oldDeals()[0]->plot->finance_amount }}</td>
                <td>{{ $merge->oldDeals()[1]->plot_no }}</td>
                <td>{{ $merge->oldDeals()[1]->plot->property_value }}</td>
                <td>{{ $merge->oldDeals()[1]->plot->finance_amount }}</td>
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
            <td class="font-weight-bold" > Total = {{ $merges->mergedDeal->sum('plot.property_value') }}</td>
            <td class="font-weight-bold" >Total = {{ $deals->sum('plot.finance_amount') }}</td>
            <td> </td>
            </tr> --}}
    </tbody>
</table>
