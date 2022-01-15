<table class="table table-responsive w-100 d-block d-md-table">
    <thead>
        <tr>
            <th scope="col" class="text-muted">Portfolio</th>
            <th scope="col" class="text-muted">Deal Start Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Block</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deals as $deal)
            <tr>
                <td>{{ $deal->portfolio->name }}</td>
                <td>{{ $deal->entry_date }}</td>
                <td>{{ $deal->client_id }}</td>
                <td>{{ $deal->client->name }}</td>
                <td>{{ $deal->plot_no }}</td>
                <td>{{ $deal->plot->area_name }}</td>
                <td>{{ $deal->plot->block }}</td>
                <td>{{ number_format($deal->plot->property_value)}}</td>
                <td>{{ number_format($deal->plot->finance_amount )}}</td>
            </tr>
        @endforeach
        <tr>
            <td>Total </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td>{{ number_format( $deals->sum('plot.property_value') ) }} </td>
            <td>{{ number_format( $deals->sum('plot_finance_amount') ) }}</td>
        </tr>
    </tbody>
</table>
