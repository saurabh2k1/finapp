<table>
    <thead>
        <tr>
            <th scope="col">reporting_date</th>
            <th scope="col">Plant</th>
            <th scope="col">capacity_utilisation</th>
            <th scope="col">power_consumption</th>
            <th scope="col">longterm_cargo_unloaded</th>
            <th scope="col">spot_cargo_unloaded</th>
            <th scope="col">service_cargo_unloaded</th>
            <th scope="col">'C2C3_throughput'</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{$record->tdate}}</td>
                <td>{{$record->plant}}</td>
                <td>{{$record->capacity_utilisation}}</td>
                <td>{{$record->power_consumption}}</td>
                <td>{{$record->longterm_cargo_unloaded}}</td>
                <td>{{$record->spot_cargo_unloaded}}</td>
                <td>{{$record->service_cargo_unloaded}}</td>
                <td>{{$record->c2c3_throughput}}</td>
            </tr>
        @endforeach
    </tbody>
</table>