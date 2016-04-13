<table class="ui table">
    <thead>
        <tr>
            <th>#</th>
            <th>username</th>
            <th>points</th>
            <th>latest submit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{$row->final_position}}</td>
            <td><a href="/user/{{$row->user->id}}">{{$row->user->username}}</a></td>
            <td>{{$row->final_points}}</td>
            <td>{{$row->final_latest_submit}}</td>
        </tr>
        @endforeach
    </tbody>
</table>            