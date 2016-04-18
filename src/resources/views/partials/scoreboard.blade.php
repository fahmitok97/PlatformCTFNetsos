<table class="ui table">
    <thead>
        <tr>
            <th>#</th>
            <th>username</th>
            <th>points</th>
            @if(isset($useLatestSubmit) && $useLatestSubmit)
                <th>latest submit</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{$row->final_position}}</td>
            <td><a href="{{ url('/user/' . $row->user->id) }}">{{$row->user->username}}</a></td>
            <td>{{$row->final_points}}</td>
            @if(isset($useLatestSubmit) && $useLatestSubmit)
                <td>{{$row->final_latest_submit}}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>            