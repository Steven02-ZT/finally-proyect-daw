<x-layout :title="'Viewer'">
    <div style="height: auto; width: 100vw;">
        <div id="video-container" class="w-100 bg-slate-50 d-flex justify-content-center position-relative" 
        style="height: 60vh;">
            <video id="video-viewer" class="w-100 h-100 bg-slate-50" controls autoplay>
                <source src="{{ asset($movie['vide_url']) }}" type="video/mp4">
            </video>
            <div id="info-viewer" class="position-absolute w-100 d-flex align-items-end" 
            style="height: 85%;">
                <div class="p-5">
                    <h1 class="text-white fs-1">{{$movie['title']}}</h1>
                    <p class="text-light-base w-50 overflow-auto h-25 fs-5">"{{$movie['description']}}</p>
                    <span class="text-light-darker fs-5">
                        @foreach ($movie['genders'] as $gender)
                            <span>{{$gender['name']}}</span>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
        <div class="w-100 p-2" style="height: 300px;">
            <h1 class="text-light-darker">Recomendaciones</h1>
            <swiper-container class="w-100 h-75" space-between="30" slides-per-view="auto" pagination="true"
            pagination-clickable="true">
                @foreach ($movies as $mov)
                    @if($mov['id'] != $movie['id'])
                        <swiper-slide class="w-75 h-100 p-1 d-flex gap-2 align-items-center">
                            <div style="background-image: url({{ asset($mov['image_url']) }});
                            background-position:center; background-size:cover; background-repeat:no-repeat;"
                            class="h-100 w-25 border border-info rounded"></div>
                            <div class="w-75 h-100 border border-info p-1 rounded">
                                <h1 class="text-white">{{$mov['title']}}</h1>
                                <p class="text-light-base h-50" style="overflow: auto;">{{$mov['description']}}</p>
                                <div class="d-flex gap-2 text-light-darker">
                                    <span>Clasificación: {{$mov['classification_id']}}</span>
                                    <span>Categoría: 
                                        @foreach ($movie['genders'] as $gender)
                                        {{$gender['name']}},
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </swiper-slide>
                    @endif
                @endforeach
            </swiper-container>
        </div>
    </div>
</x-layou>