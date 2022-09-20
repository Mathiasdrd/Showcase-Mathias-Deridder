<x-app-layout title="My Post - Edit">
    <div>
        <div>
        <h3>My Post - {{$post->post_title}}</h3>
        <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
            @csrf
            @method('PUT')
            @if($errors->any())
                <h5>{{$errors->first()}}</h5>
            @endif
            @if(Session::has('message'))
            <div class="form-error">
                   <p> {{ Session::get('message') }} </p>
            </div>
            @endif

            <img src="{{ asset('images/' . $post->image_path)}}" width="560" height="420">
            <div>
                <label for="post_title">Title</label>
                <input type="text" id="post_title" value="{{$post->post_title}}" name="post_title">
            </div>
            <div>
                <p><label for="description">Description</label></p>
                <textarea id="description" name="description" cols="20" rows="10">{{$post->description}}</textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <input type="text" id="tags" value="{{$post->tags}}" name="tags">
            </div>
            <label for="category">Choose A Category</label>
            <select name="category" id="category">
               <option value="">--- Categories ---</option>
               @foreach ($categories as $category)
                   <option value="{{$category->id}}"  @isset($post->category) {{($post->category->id === $category->id) ? 'selected' : '' }} @endisset>{{$category->category_name}}</option>
                @endforeach
            </select>
            <div>
                <button type="submit">Edit this post</button>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>