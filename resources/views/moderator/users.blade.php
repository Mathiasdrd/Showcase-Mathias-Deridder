<x-app-layout>
<div class="container justify-content-center box-shadow card-color my-5 rounded">
    @if(Session::has('message'))
        <div>
            <p class="fw-bold text-success"> {{ Session::get('message') }} </p>
        </div>
    @endif
    @if (count($users) !== 0)
    <table class="table m-0">
        <thead>
            <tr>
                <td scope="col" class="fw-bold">Username</td>
                <td scope="col" class="fw-bold">Email</td>
                <td scope="col" class="fw-bold">Active user?</td>
                <td scope="col" class="fw-bold">Handle user</td>
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
            <td>
            <form action="{{route('moderator.user-management', ['user' => $user])}}" method="POST" class="text-start">
                @csrf
                @method('PUT')
                <button type="submit" value="Change status">Change user's status</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>     
    @else 
        <p>No registered users</p>
    @endif
    <div class="d-flex justify-content-end col-11">
            <p>{{ $users->links() }}</p>
        </div>
            <p class="d-flex justify-content-end col-11"> Showing {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} results</p>
</div>
</x-app-layout>