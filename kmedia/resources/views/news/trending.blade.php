@extends('news.layout')
@section('content')

@foreach($data as $tile)
        <div class="col-xl-3 col-sm-3 mb-3">
                <a href="{{url('detail/'.$tile->id)}}">
                    <div class="card" style="width: 15vw;height: 30vh;">
                        <img class="card-img-top cropped-image" src="img/news/{{ $tile['thumbnail'] }}" alt="">
                        <i class="fas fa-play-circle video-btn"></i>
                        <div style="display: flex; flex-direction: row;justify-content: center; text-align:center;color: #8e7979;font-weight: 600;">
                            {{ Str::limit($tile['title'], 62) }}
                        </div>
                    </div>
                </a>
            </div>
    @endforeach
@endsection