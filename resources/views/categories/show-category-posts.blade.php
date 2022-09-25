<x-app-layout>
    <div class="d-inline-flex flex-wrap justify-content-center">
        @foreach ($categories as $category)
            <x-navigation :category="$category" />
        @endforeach
    </div>
    
    <h2>{{$selectedCategory->category_name}} Images</h2>

    @unless (count($posts) === 0) 
    <div class="container-fluid">
        <ul class="inline caption-style d-flex flex-wrap row justify-content-center"> 
        @foreach ($posts as $post)
        <li class="col-xl-5 col-md-10">
            <a href="{{ url('posts/' . $post->id)}}">
                <img src="{{ asset('images/' . $post->image_path)}}" alt="{{$post->description}}" class="img-fluid img-sizing" />
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
        {{ $posts->links() }}
        Showing results {{$posts->firstItem()}} of {{$posts->lastItem()}} from {{$posts->total()}}
    </div>
    @else
    <div  class="d-flex flex-wrap justify-content-center">
        <p>The {{$selectedCategory->category_name}} category has no images yet. Be the first one to publish an image in this category!</p>
    </div>
    @endunless 
</x-app-layout>