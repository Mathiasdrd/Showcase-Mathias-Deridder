<x-app-layout>
<div>
            @if(Session::has('message'))
                <div class="form-error">
                    <p> {{ Session::get('message') }} </p>
                </div>
            @endif
    <table>
        <thead>
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Active user?</td>
                <td>Handle user</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <td>{{$user->name}} </td>
            <td>{{$user->email}} </td>
            <td>
                @if($user->active_account)
                Yes
                @else 
                No
                @endif
            </td>
            <td><form action="{{route('moderator.user-management', ['user' => $user])}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" value="Change status">Change user's status</button></td>
            </form>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>