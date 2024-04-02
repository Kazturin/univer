<ul class="pl-4 text-slate-400">
    @foreach($categories as $category)
        <li><a href="{{route('news.category',$category->id)}}">{{ $category->title_kz }}</a></li>
    @endforeach
</ul>
