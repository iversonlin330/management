@include('sidebar')
會員清單
<table>
    <thead>
    <th>客戶編號</th>
    <th>姓名</th>
    <th>狀態</th>
    <th>刪除</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->u_id }}</td>
            <td><a href="{{ url('/setMember?user_id='.$user->id) }}">{{ $user->name }}</td>
            <td>{{ ($user->email_verified_at == null)? '未開通' : '已開通' }}</td>
            <td>
                <form action="{{ url('users/'.$user->id) }}" method="post">
                    @method('DELETE')
                    <input type="submit" value="刪除">
                </form>
                {{--                <a href="{{ url('users/'.$user->id) }}">刪除</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
