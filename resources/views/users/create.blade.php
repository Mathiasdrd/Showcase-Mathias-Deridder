<x-app-layout title="Create your account">
<div class="container-fluid">
    <div class="d-flex justify-content-center row">
        <div class="card-color login-form  col-xl-5 col-lg-8 col-md-12 px-4 py-4">
        <h3>Create your account</h3>
        <form method="POST" action="{{ route('users.store') }}"  class="px-4 py-3">
            @csrf
            <div class="mb-3">
                <label for="name">Your name</label>
                <input type="text" id="name"  class="form-control" value="{{old('name')}}" name="name">
                @error('name')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Your Email</label>
                <input type="text" id="email" class="form-control" value="{{old('email')}}"name="email">
                @error('email')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control"  id="password"  name="password">
                @error('password')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
                @error('password_confirmation')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation">
            </div>
            <div>
                <button type="submit">Create your account</button>
            </div>
        </form>
        </div>
    </div>
</div>
</x-app-layout>