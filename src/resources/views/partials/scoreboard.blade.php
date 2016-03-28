<table class="ui table">
    <thead>
        <tr>
            <th>#</th>
            <th>username</th>
            <th>points</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{$row->final_position}}</td>
            <td><a href="/user/{{$row->user->id}}">{{$row->user->username}}</a></td>
            <td>{{$row->final_points}}</td>
        </tr>
        @endforeach
    </tbody>
</table>            