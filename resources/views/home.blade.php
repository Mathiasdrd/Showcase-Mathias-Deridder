<x-app-layout>
    <div>
        <ul class="inline">
            @foreach ($categories as $category)
                <x-navigation :category="$category" /> 
            @endforeach
        </ul>
    </div>

</x-app-layout>