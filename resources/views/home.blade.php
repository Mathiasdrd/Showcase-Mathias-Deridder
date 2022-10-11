<x-app-layout>
    <x-search-bar />
    <x-navigation-styling>
            @foreach ($categories as $category)
                <x-navigation :category="$category" />
            @endforeach
    </x-navigation-styling>
    
    @if(Request::get('search'))
    
    @if(count($posts) !== 0) 
    <h2 class="text-white">{{Request::get('search')}} Posts</h2>
    <div class="container-fluid">
        <ul class="caption-style row card-color rounded justify-content-center p-2"> 
        @foreach ($posts as $post)
        <li class="col-xl-4 col-md-10  ps-2 py-2">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" class="img-fluid img-sizing">
            </a>
            <div class="caption">
                <div class="caption-text">
                    <h4>{{$post->post_title}}</h4>
                    <button class="btn btn-secondary"><a href="{{url('profile/' . $post->user->name)}}">{{$post->user->name}}</a></button>
                </div>
            </div>
        </li>
        @endforeach
        </ul>
        <div class="mt-4 main-text-color">
        {{ $posts->appends($_GET)->links() }} 
        Showing {{$posts->firstItem()}} to {{$posts->lastItem()}} of {{$posts->total()}} results
        </div>
    </div>
    @else
    <h2 class="text-white d-flex justify-content-center ">No results found, please try a different search term</h2>
    @endif
    @elseif(count($featuredPosts) !== 0) 
    <h2 class="text-white">Featured Posts</h2>
    <div class="container-fluid">
    <ul class="caption-style row card-color rounded justify-content-center p-2 "> 
        @foreach($featuredPosts as $featuredPost)
        <li class="col-xl-4 col-md-10 ps-2 py-2">
            <a href="{{ url('posts/' . $featuredPost->id)}}">
                <img src="{{ asset('images/' . $featuredPost->image_path)}}" class="img-fluid img-sizing"/>
            </a>
            <div class="caption">
                <div class="caption-text">
                    <button class="btn btn-secondary"><a href="{{ url('profile/'. $featuredPost->name)}}">{{$featuredPost->name}}</a></button>
                </div>
            </div>
        </li>
        @endforeach
        </ul>
    </div>
    @else 
    <h3 class="text-white">Welcome to showcase</h3>
    <p class="d-flex justify-content-center text-white">It's a little empty here, why don't you help liven it up</p>
    @endif
    
</x-app-layout>