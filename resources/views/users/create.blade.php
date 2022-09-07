<x-app-layout title="Create your account">
   
<div>
    <div>
        <h3>Create your account</h3>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div>
                <label for="name">Your name</label>
                <input type="text" id="name" value="{{old('name')}}" name="name">
                @error('name')
                <div class="form-error">
                   <p> {{$message}}</p>
                </div>
                @enderror
            </div>
            <div>
                <label for="brand">Your Email</label>
                <input type="text" id="email" value="{{old('email')}}"name="email">
                @error('email')
                <div class="form-error">
                    <p>{{ $message}}</p>
                </div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password"  name="password">
                @error('password')
                <div class="form-error">
                    <p>{{ $message}}</p>
                </div>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                <div class="form-error">
                   <p> {{ $message}}</p>
                </div>
                @enderror
            </div>
            <div>
                <button type="submit">Create your account</button>
            </div>
        </form>
    </div>
 </div>
</x-app-layout>