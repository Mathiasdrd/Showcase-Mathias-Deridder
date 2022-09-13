
    <li>{{$category['main_category']->category_name}}
        <ul> 
            @isset($category["subcategories"]) 
                @for ($i = 0; $i < count($category["subcategories"]); $i++)
                    <li>{{$category['subcategories'][$i]->category_name }}</li>
                @endfor
            @endisset
        </ul>
    </li>
