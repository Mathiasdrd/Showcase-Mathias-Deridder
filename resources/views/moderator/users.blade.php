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
                <td>Active user?</td>
                <td>Handle user</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr>
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
        </tr>
        @endforeach
        </tbody>
    </table>     
    @else 
        <p>No registered users</p>
    @endif
</div>
</x-app-layout>