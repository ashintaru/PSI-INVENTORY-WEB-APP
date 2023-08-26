<section>
    <table class="table-auto">
        <thead>
          <tr>
            <th>#</th>
            <th>Vehicle Identification No</th>
            <th>Production C B U number </th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->vehicleidno}}</td>
                <td>{{$d->productioncbunumber}}</td>
            </tr>   
        @endforeach
        </tbody>
    </table>
</section>