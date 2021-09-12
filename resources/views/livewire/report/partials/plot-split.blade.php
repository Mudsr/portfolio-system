<table class="table table-responsive d-block d-md-table">
    <thead>
        <tr>
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">New Deal1 No</th>
            <th scope="col" class="text-muted">Trx Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">New Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            <th scope="col" class="text-muted">New Deal2 No</th>
            <th scope="col" class="text-muted">Trx Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">New Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            <th scope="col" class="text-muted">Old Plot No</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($splits as $split)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $split->newPlots()[0]->id }}</td>
                <td>{{ $split->entry_date }}</td>
                <td>{{ $split->newPlots()[0]->deal->client_id }}</td>
                <td>{{ $split->newPlots()[0]->deal->client->name }}</td>
                <td>{{ $split->newPlots()[0]->deal->plot_no }}</td>
                <td>{{ $split->newPlots()[0]->area_name }}</td>
                <td>{{ $split->newPlots()[0]->property_value }}</td>
                <td>{{ $split->newPlots()[0]->finance_amount }}</td>
                <td>{{ $split->newPlots()[1]->id }}</td>
                <td>{{ $split->entry_date }}</td>
                <td>{{ $split->newPlots()[1]->deal->client_id }}</td>
                <td>{{ $split->newPlots()[1]->deal->client->name }}</td>
                <td>{{ $split->newPlots()[1]->deal->plot_no }}</td>
                <td>{{ $split->newPlots()[1]->area_name }}</td>
                <td>{{ $split->newPlots()[1]->property_value }}</td>
                <td>{{ $split->newPlots()[1]->finance_amount }}</td>
                <td>{{ $split->oldPlot->deal->plot_no }}</td>
                <td>{{ $split->oldPlot->property_value }}</td>
                <td>{{ $split->oldPlot->finance_amount }}</td>
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
