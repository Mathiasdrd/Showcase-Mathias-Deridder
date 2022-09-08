<x-app-layout>
    <div>
        <h3>Showcase Your Images</h3>
        <form action="{{route('posts.store')}}">
            @csrf
            <div>
            <label for="src">Upload Your Image Here</label>
            <input type="file" id="src" name="src">
            </div>
            <div>
            <label for="tags">Add Tags</label>
            <input type="text" id="tags" name="tags">
            </div>
            <div>
            <label for="description">Describe Your Post</label>
            <input type="text" id="description" name="description">
            </div>
            <div>
            <label for="category"></label>
            <select name="category" id="category">
               <option value="">--- Categories ---</option>
               @foreach ($categories as $category)
                   <option value="{{$category->category_name}}">{{$category->category_name}}</option>
               @endforeach
            </select>
            </div>
            <div>
            <input type="submit" value="Showcase">
            </div>
        </form>
    </div>
</x-app-layout>