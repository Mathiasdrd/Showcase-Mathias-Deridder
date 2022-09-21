<x-app-layout title="My Profile">
    <div>
        <div>
        <h3>My Profile</h3>
        <form method="POST" action="{{ route('users.update', ['user' => auth()->user()->id ]) }}">
            @csrf
            @method('PUT')
            @if($errors->any())
                <h5>{{$errors->first()}}</h5>
            @endif
            @if(Session::has('message'))
            <div class="form-error">
                   <p> {{ Session::get('message') }} </p>
            </div>
            @endif
            <div>
                <label for="email">Your Email</label>
                <input class="readonly" type="text" id="email" value="{{$user->email}}" name="email" readonly>
            </div>
            <div>
                <label for="name">Your Name</label>
                <input type="text" id="name" value="{{$user->name}}" name="name">
            </div>
            <div>
                <label for="old_password">Old Password</label>
                <input type="password" id="old_password" name="old_password">
            </div>
            <div>
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password">
            </div>
            <div>
                <button type="submit">Edit your profile</button>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>