<x-app-layout title="My Profile">
<div class="container-fluid">
    <div class="d-flex justify-content-center row">
        <div class="card-color login-form col-xl-5 col-lg-8 col-md-12 px-4 py-4">
        <h3>My Profile</h3>
        <form method="POST" action="{{ route('users.update', ['user' => auth()->user()->id ]) }}"  class="px-4 py-3">
            @csrf
            @method('PUT')
            @if($errors->any())
                <h5>{{$errors->first()}}</h5>
            @endif
            @if(Session::has('message'))
            <div class="mb-3">
                   <p> {{ Session::get('message') }} </p>
            </div>
            @endif
            <div class="mb-3">
                <label for="email">Your Email</label>
                <input class="readonly form-control" type="text" id="email" value="{{$user->email}}" name="email" readonly>
            </div>
            <div class="mb-3">
                <label for="name">Your Name</label>
                <input type="text" id="name" class="form-control"  value="{{$user->name}}" name="name">
            </div>
            <div class="mb-3">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
            <div class="mb-3">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div>
                <button type="submit">Edit your profile</button>
            </div>
        </form>
        </div>
    </div>
</div>
</x-app-layout>