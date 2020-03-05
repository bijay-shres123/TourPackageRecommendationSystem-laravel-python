@include('frontend.section._header')

@include('frontend.section._navbar')
@if($article_data)
<div class="container">
<div class="col-md-12 align-self-center">
    <div role="tabpanel" >
        <article class="panel panel-default">
            <header class="panel-heading">
        <h1 class="text-muted text-center" style="color:#153653 !important;font-weight: bolder;"><span class="glyphicon glyphicon-pencil"></span> {{$article_data->title}}</h1>
            </header>
            <div class="panel-body">

                <figure class=" "><img class="full_image img-responsive " alt="image" src="{{asset('/uploads/Article/'.$article_data->image)}}" />
                    <figcaption class="text-center"><strong></strong></figcaption>
                </figure>
                <p>{{$article_data->description}}</p>
        </article>
    </div>
</div>
</div>
@endif
@include('frontend.section._article-styled-list')
</div>
@include('frontend.section._footer')