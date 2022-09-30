<x-app-layout title="{{$profile->name}}">
    <h1 class="main-text-color">{{$profile->name}}</h1>
    
    <p class="d-flex justify-content-center main-text-color">Check out {{$profile->name}}'s posts</p>
    @if (count($posts) === 0)
        <div>
            <p>{{$profile->name}} hasn't posted anything yet. Come back later</p>
        </div>
    @else
    <div class="container-fluid">
    <div class="row card-color justify-content-center box-shadow p-2">
        @foreach ($posts as $post)
        <div class="col-12 col-md-6 col-lg-4 profile-card p-3">
            <a href="{{ url('posts/' . $post->id)}}">
            <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" class="img-fluid"/>
            </a>
        </div>
        @endforeach    
    </div>
    </div>
    @endif
    <div class="p-5 justify-content-sm-center main-text-color">
    {{ $posts->appends($_GET)->links() }} 
    Showing {{$posts->firstItem()}} to {{$posts->lastItem()}} of {{$posts->total()}} results
    </div>

</x-app-layout>