
@include('frontend.section._header')

@include('frontend.section._navbar')

    <div class="article-list container">
        <div class="article-list container">
            @if($article_data)
            @foreach($article_data as $key=>$value)
            <div class="span8">

            <a href="{{ route('front-article-single', ['id' => $value->id]) }}"><h1>{{ $value->title }}</h1></a>
                <p> {!!  substr(strip_tags($value->description), 0, 450) !!}</p>
                <div>
                    <div class="more label"><a href="{{ route('front-article-single', ['id' => $value->id]) }}">Read more</a></div>
                    <div class="tags">

                    </div>
                </div>


            </div>
            <hr style="border-top: 1px dotted #0177bd;margin-top: 45px;">
            @endforeach
            <div class="paginate" > {{ $article_data->links() }}</div>
            @endif
        </div>
    </div>
 @include('frontend.section._footer')