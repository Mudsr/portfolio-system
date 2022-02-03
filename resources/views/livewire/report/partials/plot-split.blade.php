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
<table id="customers" class="table table-responsive d-block d-md-table">
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
                <td style="text-align: center">{{ $i }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->id }}</td>
                <td style="text-align: center">{{ $split->entry_date }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->deal->client_id }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->deal->client->name }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->deal->plot_no }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->area_name }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->property_value }}</td>
                <td style="text-align: center">{{ $split->newPlots()[0]->finance_amount }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->id }}</td>
                <td style="text-align: center">{{ $split->entry_date }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->deal->client_id }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->deal->client->name }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->deal->plot_no }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->area_name }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->property_value }}</td>
                <td style="text-align: center">{{ $split->newPlots()[1]->finance_amount }}</td>
                <td style="text-align: center">{{ $split->oldPlot->deal->plot_no }}</td>
                <td style="text-align: center">{{ $split->oldPlot->property_value }}</td>
                <td style="text-align: center">{{ $split->oldPlot->finance_amount }}</td>
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
</body>
</html>