<x-app-layout>
<div class="container-fluid">
    <div class="d-flex justify-content-center row my-5">
        <div class="card-color login-form col-xl-5 col-lg-8 col-md-12 px-4 py-4 box-shadow rounded">
        <h3>Showcase Your Images</h3>
        <form action="{{route('posts.store')}}" class="px-4 py-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @if($errors->any())
                    <p class="text-danger fw-bold">{{$errors->first()}}</p>
                @endif
            <label for="image_path">Upload Your Image Here</label>
            <input type="file" class="form-control" id="image_path" name="image_path">
            </div>
            <div class="mb-3"> 
            <label for="post_title">Give Your Post A Title</label>
            <input type="text" class="form-control" id="post_title" value="{{old('post_title')}}" placeholder="Give your post a title" name="post_title" maxlength="50">
            </div>
            <div class="mb-3">
            <label for="tags">Add Tags</label>
            <input type="text" class="form-control" id="tags" value="{{old('tags')}}" placeholder="Add a few tags" name="tags" maxlength="80">
            </div>
            <div  class="mb-3"> 
            <label for="description">Describe Your Post</label>
            <textarea class="form-control" id="description" placeholder="Describe your post" name="description" maxlength="150"></textarea>
            </div>
            <div class="mb-3">
            <label for="category">Choose A Category</label>
            <select name="category" id="category">
            <option value="">--- Categories ---</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
            </select>
            </div>
            <div>
                Do you own this image?
                <label for="yes">
                    <input type="radio" name="is_image_owner" id="yes" value="1" checked>
                    Yes
                <label for="no">
                    <input type="radio" name="is_image_owner" id="no" value="0">
                    No
            </div>
            <div id="creator_field" hidden class="mb-3">
                <label for="creator">Provide a reference to the creator of this image</label>
                <input type="text" class="form-control" id="creator" name="creator">
            </div>
            <div>
                <button type="submit">Showcase</button>
            </div>
        </form>
        </div>
    </div>
</div>
</x-app-layout>