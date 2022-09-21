<x-app-layout>
    <div class="container">
        <ul class="inline">
            @foreach ($categories as $category)
                <x-navigation :category="$category" />
            @endforeach
        </ul>
    </div>
    @if(Request::get('tag'))
    <div class="container">
        <ul class="inline">
        @foreach($posts as $post)
            <li class="card-color">
                <a href="{{ url('posts/' . $post->id)}}">
                    <img src="{{ asset('images/' . $post->image_path)}}" width="360" height="300"/> 
                </a>
                <p><a href="{{ url('profile/'. $post->user->id)}}" hidden>{{$post->user->name}}</a></p>
            </li>
        @endforeach
        </ul>
    </div>
    @else 
    <div class="container">
        <ul class="inline d-flex flex-wrap">    
        @foreach($featuredPosts as $featuredPost)
            <li class="card-color">
                <a href="{{ url('posts/' . $featuredPost->id)}}">
                    <img src="{{ asset('images/' . $featuredPost->image_path)}}" width="360" height="300"/> 
                </a>
                <p><a href="{{ url('profile/'. $featuredPost->user_id)}}" hidden>{{$featuredPost->name}}</a></p>
            </li>
        @endforeach
        </ul>
    </div>
    @endif

</x-app-layout>