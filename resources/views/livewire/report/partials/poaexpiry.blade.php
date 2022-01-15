
<table class="table table-responsive w-100 d-block d-md-table" >
    <thead>
        <tr>
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">Deal No</th>
            <th scope="col" class="text-muted" style="width: 93px;">Trx Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted" >Client Name</th>
            <th scope="col" class="text-muted">Plot No</th>
            <th scope="col" class="text-muted">PAI Client Id</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Block</th>
           
            {{-- @if ($this->type == "all") --}}
            
            <th scope="col" class="text-muted"  style="width: 93px;">POA Expiry</th>

            {{-- @else --}}
            {{-- <th scope="col" class="text-muted"  style="width: 93px;"> Expiry</th> --}}
            {{-- @endif --}}

            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($deals as $deal)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $deal->id }}</td>
                <td>{{ $deal->entry_date }}</td>
                <td>{{ $deal->client_id }}</td>
                <td>{{ $deal->client->name }}</td>
                <td>{{ $deal->plot_no }}</td>
                <td>{{ $deal->plot->pai_client_id }}</td>
                <td>{{ $deal->plot->area_name }}</td>
                <td>{{ $deal->plot->block }}</td>
                
                {{-- @if ($this->type == "all") --}}

                 <td>{{ old('power_of_attorney_expiry_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->first()->getCustomProperty('expiry_date'): '') }}</td>
                {{-- @else --}}
                {{-- <td>{{ $deal->plot->getMedia($type)->first()->getCustomProperty('expiry_date') }}</td>   --}}
                {{-- @endif --}}
                <td>{{ number_format($deal->plot->property_value) }}</td>
                <td>{{ number_format( $deal->plot->finance_amount ) }}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        <tr>
            <td>Total </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td></td>
         
            <td class="font-weight-bold" > {{number_format( $deals->sum('plot.property_value') )}}</td>
            <td class="font-weight-bold" >{{number_format( $deals->sum('plot.finance_amount')) }}</td>
        </tr>
    </tbody>
</table>
