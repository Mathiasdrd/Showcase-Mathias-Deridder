

   <li> <a href="{{ url('categories/'. $category->id)}}">{{$category->category_name}}</a>
    @if ($category->children)
    <ul>
        @foreach ($category->children as $subcategory)
           <li><a href="{{ url('categories/' . $subcategory->id)}}"> {{ $subcategory->category_name }}</a></li>
        @endforeach
    </ul>
    @endif
   </li>
  
