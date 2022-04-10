@extends('news.admin_layout')
@section('content')
<style>
 
* {
    margin: 0;
    padding: 0;
}
img{
  vertical-align:middle;
  border-style:none
  }
  img {
    height: auto;
    max-width: 100%;
}
.mt-5,.my-5{
  margin-top:3rem!important
  }
  .mb-5,.my-5{
    margin-bottom:3rem!important
  }
  h5 {
  text-align: justify;
  text-justify: inter-word;
}
.button {
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
  border-radius: 8px;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white;
  color: black;
  border: 2px solid #ff0000;
  border-radius: 8px;
}

.button2:hover {
  background-color: #ff0000;
  color: white;
}
.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}


</style>

<div class="container">
  <div class="row justify-content-left">
    <div class="col-8">
      <h1 class="font-pt">{{ $contents->title }}</h2>
      <p class="gazette-post-date">{{ $contents->created_at }}</p>
      @if( $contents->url=="" )
        <div class="blog-post-thumbnail my-5">
        <img src="{{asset('img/news')}}/{{ $contents->thumbnail }}" alt="post-thumb" >
        </div>
      @endif
      <div class="container "><center>
        {!! $contents->url !!} 
        </center>
      </div>
      <div class="container">
          @if( $contents->url=="" )
          @else
           <h4 style="font-family:Verdana;"><b>Description:</h4>
          @endif
        <h5 style="font-family:Verdana;">{{ $contents->content_text }}</h5>
        @if( $contents->poll=="0" )
          @else
          <br><br>
          <h6 style="font-family:Verdana;">{{ $contents->polling->question }}</h6>
            @foreach($contents->polling->polling_options as $content)
                    <a class="button button5" href="{{url('addvote/'.$content['id'])}}"> {{ $content->option }}</a><br>
            @endforeach
        @endif
        <!-- <a href="{{url('add/'.$contents->id)}}" class="button button1">Update</a> -->
        <a href="{{url('del/'.$contents->id)}}" class="button button2">Delete</a>
      </div>
      <br>
        
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ml_IN/sdk.js#xfbml=1&version=v11.0" nonce="B77EdApf"></script>
      <div class="fb-comments" data-href="http://127.0.0.1:8000/detail/31" data-width="" data-numposts="10"></div>
    </div>
    <div class="col">
      <img src="{{asset('img/ad')}}/{{ $contents->ad->adthumbnail }}" alt="ad" ><br><br><br>
      @foreach($data as $tile)
        @if($tile->id==$contents->id)
        @else
          <div class="col-xl-3 col-sm-6 mb-3">
                  <a href="{{url('detail/'.$tile->id)}}">
                      <div class="card" style="width: 15vw;height: 26vh;">
                          <img class="card-img-top cropped-image" src="{{asset('img/news')}}/{{ $tile['thumbnail'] }}" alt="">
                          <i class="fas fa-play-circle video-btn"></i>
                          <div style="display: flex; flex-direction: row;justify-content: center; align-items: center">
                              <p style="text-align:center;color: #8e7979;font-weight: 600;"> {{ $tile['title'] }}</p>
                          </div>
                      </div>
                  </a>
              </div>
        @endif
      @endforeach
    <br><br>
    
     
    </div>   
  </div>          
     
  
</div>


@endsection