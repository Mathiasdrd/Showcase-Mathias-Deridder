<x-app-layout>
    <h2>{{$category->category_name}} Images</h2>

    @unless (count($posts) === 0) 
    @foreach ($posts as $post)
    <ul class="inline"> 
        @foreach ($posts as $post)
        <li class="category-item">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}">
                <a href='{{url('profile/' . $post->user->id)}}'>{{$post->user->name}}</a>
            </a>
        </li>
        @endforeach
    </ul>
    @endforeach   
    @else
        <p>The {{$category->category_name}} category has no images yet. Be the first one to publish an image in this category!</p>
    @endunless 
</x-app-layout>