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
<table id="customers" class="table table-responsive w-100 d-block d-md-table" >
    <thead>
        <tr>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Sr No</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Deal No</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted" >Trx Date</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Client Id</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted" >Client Name</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Plot No</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">PAI Client Id</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Area</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Block</th>
           
            {{-- @if ($this->type == "all") --}}
            
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">POA Expiry</th>

            {{-- @else --}}
            {{-- <th scope="col" style="text-align: center; border:1px solid black" class="text-muted"  style="width: 93px;"> Expiry</th> --}}
            {{-- @endif --}}

            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Property Value</th>
            <th scope="col" style="text-align: center; border:1px solid black" class="text-muted">Finance Amount</th>
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

                 <td style="text-align: center; border:1px solid black">{{ old('power_of_attorney_expiry_date', $deal->plot->getMedia('power_of_attorney')->isNotEmpty() ? $deal->plot->getMedia('power_of_attorney')->first()->getCustomProperty('expiry_date'): '') }}</td>
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
         
            <td class="font-weight-bold" style="text-align: center; border:1px solid black"> {{number_format( $deals->sum('plot.property_value') )}}</td>
            <td class="font-weight-bold" style="text-align: center; border:1px solid black">{{number_format( $deals->sum('plot.finance_amount')) }}</td>
        </tr>
    </tbody>
</table>
</body>
</html>