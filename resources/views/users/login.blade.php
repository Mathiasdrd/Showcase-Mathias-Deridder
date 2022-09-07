<x-app-layout title="Login">
   
<div>
    <div>
    <h3>Login</h3>
    <form method="POST" action="/users/authenticate">
        @csrf
        <div>
            @error('email')
            <div class="form-error">
                <p>{{ $message}}</p>
            </div>
            @enderror
            @error('password')
            <div class="form-error">
                <p>{{ $message}}</p>
            </div>
            @enderror
            <label for="email">Your Email</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input  type="password" id="password" name="password">
        </div>
        <div>
            <label for="remember">Stay logged in</label>
            <input type="checkbox" name="remember" id="remember">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    </div>
</div>
</x-app-layout>