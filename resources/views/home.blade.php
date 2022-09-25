<x-app-layout>
    <div class="d-inline-flex flex-wrap">
        @foreach ($categories as $category)
            <x-navigation :category="$category" />
        @endforeach
    </div>
    @if(Request::get('tag'))
    <div class="container-fluid">
        <ul class="inline caption-style d-flex flex-wrap row justify-content-center"> 
        @foreach ($posts as $post)
        <li class="col-xl-5 col-md-10">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" class="img-fluid img-sizing">
            </a>
            <div class="caption">
                <div class="caption-text">
                    <h4>{{$post->post_title}}</h4>
                    <button class="btn btn-secondary"><a href="{{url('profile/' . $post->user->id)}}">{{$post->user->name}}</a></button>
                </div>
            </div>
        </li>
        @endforeach
        </ul>
        {{ $posts->appends($_GET)->links() }} 
        Showing results {{$posts->firstItem()}} of {{$posts->lastItem()}} from {{$posts->total()}}
    </div>
    @else 
    <div class="container-fluid">
    <ul class="inline caption-style d-flex flex-wrap row justify-content-center"> 
        @foreach($featuredPosts as $featuredPost)
        <li class="col-xl-5 col-md-10">
            <a href="{{ url('posts/' . $featuredPost->id)}}">
                <img src="{{ asset('images/' . $featuredPost->image_path)}}" class="img-fluid img-sizing"/>
            </a>
            <div class="caption">
                <div class="caption-text">
                    <button class="btn btn-secondary"><a href="{{ url('profile/'. $featuredPost->user_id)}}">{{$featuredPost->name}}</a></button>
                </div>
            </div>
        </li>
        @endforeach
        </ul>
    </div>
    @endif
    
    
</x-app-layout>