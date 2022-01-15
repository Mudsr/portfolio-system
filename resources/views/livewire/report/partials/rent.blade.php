<table class="table table-responsive w-100 d-block d-md-table">
    <thead>
        <tr>
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Block</th>
            <th scope="col" class="text-muted">Plot</th>
           
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">Deal Date</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            @if($status == "pending")

            @else
            <th scope="col" class="text-muted">Paid Upto</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($deals as $deal)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $deal->plot->area_name }}</td>
                <td>{{ $deal->plot->block }}</td>
                <td>{{ $deal->plot_no }}</td>
                 
               
                <td>{{ $deal->client->name }}</td>
                <td>{{ $deal->entry_date }}</td>
                <td>{{number_format( $deal->plot->property_value )}}</td>
                <td>{{ number_format($deal->plot->finance_amount) }}</td>
                @if($status == "pending")

                @else
                <td>{{$deal->paiRentPayments->last()->to_date}}</td>
                @endif
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td class="font-weight-bold" > Total = {{ number_format($deals->sum('plot.property_value')) }}</td>
            <td class="font-weight-bold" >Total = {{ number_format($deals->sum('plot.finance_amount')) }}</td>
        </tr>
    </tbody>
</table>
