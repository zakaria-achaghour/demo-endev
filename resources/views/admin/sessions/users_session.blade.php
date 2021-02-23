<table  class="table table-striped " >
    <thead class="thead-inverse">
        <tr>
            <th colspan="2">#</th>
            <th>Name</th>
            <th>Cin</th>
            <th >Email</th>
            <th>Telephone</th>

        </tr>
        </thead>
        <tbody id="myTable">
            @forelse ($users as $user)
            <tr >
                <td colspan="2"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->cin }}</td>
                <td >{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
            </tr>
            @empty
            <span class="badge badge-info">No Participants</span>
            @endforelse
          
        </tbody>
</table>