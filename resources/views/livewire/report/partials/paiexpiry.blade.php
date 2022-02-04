<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #5d7cd3;
  color: white;
}
</style>
</head>
<body>
<table   id="customers" >
    <thead>
        <tr>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Sr No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Deal No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Trx Date</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Client Id</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted" >Client Name</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Plot No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">PAI Client Id</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Area</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Block</th>
           
            {{-- @if ($this->type == "all") --}}
            <th scope="col" class="text-muted"  >PAI Expiry</th>
           

            {{-- @else --}}
            {{-- <th scope="col" class="text-muted"  style="width: 93px;"> Expiry</th> --}}
            {{-- @endif --}}

            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Property Value</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($deals as $deal)
            <tr>
                <td style="text-align: center; border:1px solid black">{{ $i }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->entry_date }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->client_id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->client->name }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->plot_no }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->plot->pai_client_id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->plot->area_name }}</td>
                <td style="text-align: center; border:1px solid black">{{ $deal->plot->block }}</td>
                
                {{-- @if ($this->type == "all") --}}
                 <td style="text-align: center; border:1px solid black">{{ old('pai_expiry_date', $deal->plot->getMedia('pai')->isNotEmpty() ? $deal->plot->getMedia('pai')->first()->getCustomProperty('expiry_date'): '') }}</td>

                {{-- @else --}}
                {{-- <td style="text-align: center; border:1px solid black">{{ $deal->plot->getMedia($type)->first()->getCustomProperty('expiry_date') }}</td>   --}}
                {{-- @endif --}}
                <td style="text-align: center; border:1px solid black">{{ number_format($deal->plot->property_value) }}</td>
                <td style="text-align: center; border:1px solid black">{{ number_format( $deal->plot->finance_amount ) }}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
        <tr>
            <td style="text-align: center; border:1px solid black">Total </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"> </td>
            <td style="text-align: center; border:1px solid black"></td>
  
            <td style="text-align: center; border:1px solid black" class="font-weight-bold" > {{number_format( $deals->sum('plot.property_value') )}}</td>
            <td style="text-align: center; border:1px solid black" class="font-weight-bold" > {{number_format( $deals->sum('plot.finance_amount')) }}</td>
        </tr>
    </tbody>
</table>
</body>
</html>