<x-app-layout title="Login">
<div class="container-fluid">
    <div class="row d-flex justify-content-center row">
        <div class="card-color login-form col-xl-5 col-lg-8 col-md-12  py-4 px-4">
            <h3>Login</h3>
            <form method="POST" action="/users/authenticate" class="px-4 py-3">
                @csrf
                <div class="mb-3">
                    @error('email')
                    <div>
                        <p>{{ $message}}</p>
                    </div>
                    @enderror
                    @error('password')
                    <div>
                        <p>{{ $message}}</p>
                    </div>
                    @enderror
                    <label for="email">Your Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input  type="password"  class="form-control" id="password" name="password">
                </div>
                <div>
                    <label for="remember">Stay logged in</label>
                    <input type="checkbox" name="remember" id="remember">
                </div>
                <div>
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>