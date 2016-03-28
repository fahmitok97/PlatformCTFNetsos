<div class="panel panel-default">
    <div class="panel-heading">scoreboard</div>
    <div class="panel-body">
        <table class="table table-condensed">
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
    </div>
</div>
