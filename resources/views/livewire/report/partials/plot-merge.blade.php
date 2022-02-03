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
                <td style="text-align: center">{{ $i }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[0]->id }}</td>
                <td style="text-align: center">{{ $merge->entry_date }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->client_id }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->client->name }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->plot_no }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->plot->area_name }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->plot->property_value }}</td>
                <td style="text-align: center">{{ $merge->mergedDeal->plot->finance_amount }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[0]->plot_no }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[0]->plot->property_value }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[0]->plot->finance_amount }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[1]->plot_no }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[1]->plot->property_value }}</td>
                <td style="text-align: center">{{ $merge->oldDeals()[1]->plot->finance_amount }}</td>
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