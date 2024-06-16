<x-layout :title="'Home'">
<div>
    <swiper-container class="init-slider" pagination="true" pagination-dynamic-bullets="true" loop="true" autoplay-delay="5000" autoplay-disable-on-interaction="false">
        @foreach($movies as $index => $movie)
            @if($index <= 2)
                <swiper-slide class="position-relative flex">
                    <img class="image-back position-absolute w-100 h-100" src="{{ asset($movie['image_url']) }}" alt="">
                    <div class="w-100 h-100 slide-contain position-relative p-5">
                        <img class="image-front position-absolute" src="{{ asset($movie['image_url']) }}" alt="">
                        <div class="p-3">
                            <h1 class="text-light-base fs-2">{{$movie['title']}}</h1>
                            <p class="text-light-darker mt-5 w-50"
                            style="height: 100px; overflow: auto;"><span>{{$movie['description']}}</span></p>
                            <a href="{{ url('viewer/' . $movie['id']) }}" class="btn p-2 mt-5 bg-blue-base fs-5 text-light-base rounded-pill" style="width: 100pt;">Watch</a>
                        </div>
                    </div>
                </swiper-slide>
            @endif
        @endforeach
  </swiper-container>
</div>

<div class="p-5">
    <h1 class="text-light-base fw-light fs-2">Sugerencias</h1>
    <swiper-container class="movie-slider pt-2" pagination="true" pagination-clickable="true" space-between="30"
        slides-per-view="8" loop="true">
        @foreach ($movies as $movie)
            <swiper-slide class="bg-white h-100">
                <a href="" class="w-100 h-100">
                    <img src="{{ asset($movie['image_url']) }}" alt="">
                </a>
            </swiper-slide>
        @endforeach
    </swiper-container>
</div>
 
<div class="p-5 pt-0">
    <h1 class="text-light-base fw-light fs-2">Más vistas</h1>
    <swiper-container class="medium-movie-slide" pagination="true" pagination-clickable="true" slides-per-view="5"
        space-between="20" free-mode="true">
        @foreach ($movies as $movie)
            <swiper-slide class="bg-white">
                <a href="" class="w-100 h-100">
                    <img src="{{ asset($movie['image_url']) }}" alt="">
                </a>
            </swiper-slide>
        @endforeach
    </swiper-container>
</div>

<div class="p-5 pt-0">
    <h1 class="text-light-base fw-light fs-2">Ultimas agregadas</h1>
    <swiper-container class="movie-slider pt-2" pagination="true" pagination-clickable="true" space-between="30"
        slides-per-view="8" loop="true">
        @foreach($movies as $index => $movie)
            <swiper-slide class="bg-white h-100">
                <a href="" class="w-100 h-100">
                    <img src="{{ asset($movie['image_url']) }}" alt="">
                </a>
            </swiper-slide>
        @endforeach
    </swiper-container>
</div>
</x-layout>