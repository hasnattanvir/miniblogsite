@extends('layouts.website')
  @section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Tag</span>
            <h3>{{$tag->name}}</h3>
            <p>{{$tag->description}}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">

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
                              {{-- jodi post admin image na pai tahole onno image show korbe --}}
                              {{-- @if($item->user->image){{asset($item->user->image)}} @else {{asset('website/images/profile.png')}}@endif --}}
                                <img src="@if($item->user->image){{asset($item->user->image)}} @else {{asset('website/images/profile.png')}}@endif" alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$item->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{$item->created_at->format('M d, Y')}}</span>
                        </div>
                        {{ Str::limit($item->discription,200) }}
                        <p><a href="{{route('website.post',['slug' => $item->slug])}}">Read More</a></p>
                    </div>
                </div>
          </div>
          @endforeach
          

        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
               {{ 
          $posts->links('pagination::bootstrap-4')
          }}
            </div>
          </div>
      </div>
    </div>
  </div>
    
@endsection