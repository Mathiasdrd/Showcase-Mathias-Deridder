<x-app-layout title="Create your account">
   
<div>
    <div class="bg-white rounded shadow-md p-5">
        <h3 class="text-3xl text-center">Create your account</h3>
        <form method="POST" action="{{ route('users.store') }}" class="text-center">
            @csrf
            <div class="p-1 pt-3">
                <label for="name" class="font-bold -ml-3 pr-8">Your name</label>
                <input type="text" id="name" value="{{old('name')}}" name="name" 
                class=
                "bg-gray-100 border border-gray-500
                text-sm rounded-lg hover:border-sky-700">

                @error('name')
                <div class="form-error">
                   <p>{{$message}}</p>
                </div>
                @enderror
            </div>
            <div class="pt-1">
                <label for="email" class="font-bold -ml-3 pr-8">Your Email</label>
                <input type="text" id="email" value="{{old('email')}}"name="email"
                class=
                "bg-gray-100 border border-gray-500
                text-sm rounded-lg hover:border-sky-700">
                @error('email')
                <div class="form-error">
                    <p>{{$message}}</p>
                </div>
                @enderror
            </div>
            <div class="pt-1">
                <label for="password" class="font-bold -ml-3 pr-8">Password</label>
                <input type="password" id="password"  name="password"
                class=
                "bg-gray-100 border border-gray-500
                text-sm rounded-lg hover:border-sky-700">
                @error('password')
                <div class="form-error">
                    <p>{{$message}}</p>
                </div>
                @enderror
                @error('password_confirmation')
                <div class="form-error">
                   <p> {{$message}}</p>
                </div>
                @enderror
            </div>
            <div class="p-2">
                <label for="password_confirmation" class="font-bold pr-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                class="bg-gray-100 border border-gray-500 text-md rounded-lg">
            </div>
            <div>
                <button type="submit" class="bg-sky-300 m-3 px-4 border rounded-full hover:bg-sky-500">Create your account</button>
            </div>
        </form>
    </div>
 </div>
</x-app-layout>