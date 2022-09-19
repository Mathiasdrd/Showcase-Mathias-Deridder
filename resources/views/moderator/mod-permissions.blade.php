<x-app-layout>
    <div>
        @if(Session::has('message'))
            <div class="form-error">
                <p> {{ Session::get('message') }} </p>
            </div>
        @endif
        @if (count($users) !== 0)
        <table>
            <thead>
                <tr>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Active moderator</td>
                    <td>Handle moderator role</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->is_moderator)
                    Yes
                    @else
                    No
                    @endif
                </td>
                <td>
                    <form action="{{route('moderator.handle-permissions', ['user' => $user])}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($user->is_moderator)
                            <button type="submit">Revoke moderator</button>
                        @else
                            <button type="submit">Grant moderator</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>     
        @else 
            <p>No registered users</p>
        @endif
    </div>
    </x-app-layout>