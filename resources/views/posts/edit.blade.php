<x-app-layout title="My Post - Edit">

<div class="container-fluid">
    <div class="d-flex justify-content-center row">
        <div class="card-color login-form col-lg-5 col-md-12 px-4 py-4 rounded box-shadow">
        <h3>My Post - {{$post->post_title}}</h3>
        <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}"  class="px-4 py-3">
            @csrf
            @method('PUT')
            @if($errors->any())
                <h5 class="text-danger">{{$errors->first()}}</h5>
            @endif
            @if(Session::has('message'))
            <div class="form-error">
                   <p class="text-success"> {{ Session::get('message') }} </p>
            </div>
            @endif

            <img src="{{ asset('images/' . $post->image_path)}}" class="edit-image img-fluid">
            <div  class="mb-3">
                <label for="post_title">Title</label>
                <input type="text" id="post_title" class="form-control" value="{{$post->post_title}}" name="post_title">
            </div>
            <div  class="mb-3">
                <p><label for="description">Description</label></p>
                <textarea id="description" name="description" class="form-control" cols="20" rows="5">{{$post->description}}</textarea>
            </div>
            <div  class="mb-3">
                <label for="tags">Tags</label>
                <input type="text" id="tags" class="form-control" value="{{$post->tags}}" name="tags">
            </div>
            <div class="mb-3">
            <label for="category">Choose A Category</label>
            <select name="category" id="category">
               <option value="">--- Categories ---</option>
               @foreach ($categories as $category)
                   <option value="{{$category->id}}"  @isset($post->category) {{($post->category->id === $category->id) ? 'selected' : '' }} @endisset>{{$category->category_name}}</option>
                @endforeach
            </select>
            </div>
            <div>
                <button type="submit">Edit this post</button>
            </div>
        </form>
        </div>
    </div>
</div>
</x-app-layout>