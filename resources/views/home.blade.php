<x-app-layout>
    <div>
        <ul class="inline">
            @foreach ($categories as $category)
                <li><x-navigation :category="$category" /> </li>
            @endforeach
        </ul>
    </div>
    @if(Request::get('tag'))
        <ul class="inline">
        @foreach($posts as $post)
            <li>
                <p><a href="{{ url('profile/'. $post->user->id)}}" >{{$post->user->name}}</a></p>
                <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" width="360" height="300"/> 
                </a>
            </li>
        @endforeach
        </ul>
    @else 
        <ul class="inline">    
        @foreach($featuredPosts as $featuredPost)
            <li>
            <p><a href="{{ url('profile/'. $featuredPost->user_id)}}" >{{$featuredPost->name}}</a></p>
            <a href="{{ url('posts/' . $featuredPost->id)}}">
            <img src="{{ asset('images/' . $featuredPost->image_path)}}" width="360" height="300"/> 
            </a>
            </li>
        @endforeach
        </ul>
    @endif

</x-app-layout>