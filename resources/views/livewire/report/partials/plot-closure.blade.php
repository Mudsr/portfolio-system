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
            <th scope="col" class="text-muted">Sr No</th>
            <th scope="col" class="text-muted">Deal No</th>
            <th scope="col" class="text-muted">Trx Date</th>
            <th scope="col" class="text-muted">Client Id</th>
            <th scope="col" class="text-muted">Client Name</th>
            <th scope="col" class="text-muted">Plot No</th>
            <th scope="col" class="text-muted">Area</th>
            <th scope="col" class="text-muted">Block</th>
            <th scope="col" class="text-muted">Property Value</th>
            <th scope="col" class="text-muted">Finance Amount</th>
            <th scope="col" class="text-muted">Sold To</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($deals as $deal)
            <tr>
                <td style="text-align: center">{{ $i }}</td>
                <td style="text-align: center">{{ $deal->id }}</td>
                <td style="text-align: center">{{ $deal->entry_date }}</td>
                <td style="text-align: center">{{ $deal->client_id }}</td>
                <td style="text-align: center">{{ $deal->client->name }}</td>
                <td style="text-align: center">{{ $deal->plot_no }}</td>
                <td style="text-align: center">{{ $deal->plot->area_name }}</td>
                <td style="text-align: center">{{ $deal->plot->block }}</td>
                <td style="text-align: center">{{ $deal->plot->property_value }}</td>
                <td style="text-align: center">{{ $deal->plot->finance_amount }}</td>
                <td style="text-align: center">{{ $deal->sold_to }}</td>
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
            <td> </td>
            <td class="font-weight-bold" style="text-align: center"> Total = {{ $deals->sum('plot.property_value') }}</td>
            <td class="font-weight-bold" style="text-align: center">Total = {{ $deals->sum('plot.finance_amount') }}</td>
            <td> </td>
            </tr>
    </tbody>
</table>
</body>
</html>