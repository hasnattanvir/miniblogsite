 @extends('layouts.website')

 @section('content')

 <div class="container">
   <div class="row">
    @if($posts->isNotEmpty())
      @foreach ($posts as $item)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{route('website.post',['slug' => $item->slug])}}"><img src="{{$item->image}}" alt="Image"
                            class="img-fluid rounded" ></a>
                    <div class="excerpt">
                        {{-- ai babe use korle side spreed kom hobe --}}
                        {{-- <span class="post-category text-white bg-secondary mb-3">{{$item->Category->name}}</span>
                        --}}
                        <span class="post-category text-white bg-secondary mb-3">{{$item->Category->name}}</span>


                        <h2><a href="{{route('website.post',['slug' => $item->slug])}}">{{$item->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left">
                                <img src="@if($item->user->image){{asset($item->user->image)}} @else {{asset('website/images/profile.png')}}@endif" alt="Image" class="img-fluid">
                               {{-- php var_dump($item); --}}
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ $item->user->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{$item->created_at->format('M d, Y')}}</span>
                        </div>
                        {!! Str::limit($item->discription,400) !!}
                        <p><a href="{{route('website.post',['slug' => $item->slug])}}">Read More</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    <div>
        <h2>No posts found</h2>
    </div>
    @endif

  </div>
</div>
@endsection
 
