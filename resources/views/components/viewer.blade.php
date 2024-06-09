<x-layout :title="'Viewer'">
    <div style="height: auto; width: 100vw;">
        <div id="video-container" class="w-100 bg-slate-50 d-flex justify-content-center position-relative" 
        style="height: 60vh;">
            <video id="video-viewer" class="w-100 h-100 bg-slate-50" controls autoplay>
                <source src="{{asset('/movies/action/BadBoys3/BadBoys3.mp4')}}" type="video/mp4">
            </video>
            <div id="info-viewer" class="position-absolute w-100 d-flex align-items-end" 
            style="height: 85%;">
                <div class="p-5">
                    <h1 class="text-white fs-1">titulo</h1>
                    <p class="text-light-base w-50 overflow-auto h-25 fs-5">"Bad Boys para siempre" es la tercera entrega de la franquicia "Bad Boys", protagonizada por Will Smith y Martin Lawrence. La película fue dirigida por Adil El Arbi y Bilall Fallah y se estrenó el 17 de enero de 2020.</p>
                    <span class="text-light-darker fs-5">Acción, Comedia</span>
                </div>
            </div>
        </div>
        <div class="w-100 p-2" style="height: 300px;">
            <h1 class="text-light-darker">Recomendaciones</h1>
            <swiper-container class="w-100 h-75" space-between="30" slides-per-view="auto" pagination="true"
            pagination-clickable="true">
                <swiper-slide class="w-75 h-100 p-1 d-flex gap-2 align-items-center">
                    <div style="background-image: url({{asset('/movies/action/BadBoys3/BadBoys3.jpg')}});
                    background-position:center; background-size:cover; background-repeat:no-repeat;"
                    class="h-100 w-25 border border-info rounded"></div>
                    <div class="w-75 h-100 border border-info p-1 rounded">
                        <h1 class="text-white">Title</h1>
                        <p class="text-light-base">"Bad Boys para siempre" es una película de acción y comedia que ha sido bien recibida por los fans de la franquicia, ofreciendo una emocionante y divertida experiencia para aquellos que buscan una película llena de acción y humor.</p>
                        <div class="d-flex gap-2 text-light-darker">
                            <span>Clasificación: B</span>
                            <span>Categoría: Acción, Comedia</span>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="w-75 h-100 p-1 d-flex gap-2 align-items-center">
                    <div style="background-image: url({{asset('/movies/action/BadBoys3/BadBoys3.jpg')}});
                    background-position:center; background-size:cover; background-repeat:no-repeat;"
                    class="h-100 w-25 border border-info rounded"></div>
                    <div class="w-75 h-100 border border-info p-1 rounded">
                        <h1 class="text-white">Title</h1>
                        <p class="text-light-base">"Bad Boys para siempre" es una película de acción y comedia que ha sido bien recibida por los fans de la franquicia, ofreciendo una emocionante y divertida experiencia para aquellos que buscan una película llena de acción y humor.</p>
                        <div class="d-flex gap-2 text-light-darker">
                            <span>Clasificación: B</span>
                            <span>Categoría: Acción, Comedia</span>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="w-75 h-100 p-1 d-flex gap-2 align-items-center">
                    <div style="background-image: url({{asset('/movies/action/BadBoys3/BadBoys3.jpg')}});
                    background-position:center; background-size:cover; background-repeat:no-repeat;"
                    class="h-100 w-25 border border-info rounded"></div>
                    <div class="w-75 h-100 border border-info p-1 rounded">
                        <h1 class="text-white">Title</h1>
                        <p class="text-light-base">"Bad Boys para siempre" es una película de acción y comedia que ha sido bien recibida por los fans de la franquicia, ofreciendo una emocionante y divertida experiencia para aquellos que buscan una película llena de acción y humor.</p>
                        <div class="d-flex gap-2 text-light-darker">
                            <span>Clasificación: B</span>
                            <span>Categoría: Acción, Comedia</span>
                        </div>
                    </div>
                </swiper-slide>
            </swiper-container>
        </div>
    </div>
</x-layou>