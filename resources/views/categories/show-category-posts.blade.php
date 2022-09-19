<x-app-layout>
    <div>
        <ul class="inline">
            @foreach ($categories as $category)
                <x-navigation :category="$category" /> 
            @endforeach
        </ul>
    </div>
    
    <h2>{{$selectedCategory->category_name}} Images</h2>

    @unless (count($posts) === 0) 
    <ul class="inline"> 
        @foreach ($posts as $post)
        <li class="category-item">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" width="360" height="300">
            </a>
            <a href='{{url('profile/' . $post->user->id)}}'>{{$post->user->name}}</a>
        </li>
        @endforeach
    </ul>
    @else
        <p>The {{$selectedCategory->category_name}} category has no images yet. Be the first one to publish an image in this category!</p>
    @endunless 
</x-app-layout>