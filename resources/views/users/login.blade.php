<x-app-layout title="Login">
   
<div class="bg-white rounded shadow-md p-5">
    <h3 class="text-3xl text-center">Login</h3>
    <form method="POST" action="/users/authenticate" class="text-center">
        @csrf
        <div class="p-2">
            @error('email')
            <div class="text-red-100">
                <p>{{ $message}}</p>
            </div>
            @enderror
            @error('password')
            <div class="text-red-100">
                <p>{{ $message}}</p>
            </div>
            @enderror
            <label for="email" class="font-bold pr-2">Your Email</label>
            <input type="text" id="email" name="email"
            class=
                "bg-gray-100 border border-gray-500
                text-sm rounded-lg hover:border-sky-900 border border-2">
        </div>
        <div class="p-2">
            <label for="password" class="font-bold pr-2">Password</label>
            <input  type="password" id="password" name="password"
            class=
                "bg-gray-100 border border-gray-500
                text-sm rounded-lg hover:border-sky-900 border-2">
        </div>
        <div>
            <label for="remember" class="font-bold">Stay logged in</label>
            <input type="checkbox" name="remember" id="remember">
        </div>
        <div>
            <button type="submit" class="bg-sky-300 m-3 px-4 border rounded-full hover:bg-sky-500">Log in</button>
        </div>
    </form>
</div>
</x-app-layout>