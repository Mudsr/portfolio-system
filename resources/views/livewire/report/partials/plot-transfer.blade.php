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
<table id="customers" class="table table-responsive w-100 d-block d-md-table">
    <thead>
        <tr>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Sr No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Deal No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Trx Date</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Client Id From</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Client Name From</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Client Id To</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Client Name To</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Plot No</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Area</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Block</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Property Value</th>
            <th style="text-align: center; border:1px solid black" scope="col" class="text-muted">Finance Amount</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($transfers as $transfer)
            <tr>
                <td style="text-align: center; border:1px solid black">{{ $i }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->deal->id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->entry_date }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->old_client_id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->oldClient->name }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->new_client_id }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->newClient->name }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->deal->plot_no }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->area_name }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->block }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->property_value }}</td>
                <td style="text-align: center; border:1px solid black">{{ $transfer->plot->finance_amount }}</td>
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
</body>
</html>