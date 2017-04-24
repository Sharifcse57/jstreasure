<div class="menu-bar">
  <ul class="list-inline text-center">
  	     @if(!empty($category))
	        @foreach ($category as $categoryData)
	          <li><a href="category/{{ $categoryData->slug }}">{{$categoryData->title}}</a></li>
	        @endforeach
        @endif
  </ul>
</div>