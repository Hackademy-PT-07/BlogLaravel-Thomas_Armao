<x-main>

    <x-slot:title>Anime By Genres</x-slot>

        <div class="container mt-5">
            <h1>Anime Genres</h1>

            <div class="mt-5">
                <div class="row g-3">
                    @foreach($anime as $animeItem)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{$animeItem['title']}}</h5>
                                <div class="mt-2">
                                    <img src="{{$animeItem['images']['jpg']['image_url']}}" alt="{{$animeItem['title']}}" class="img-fluid">
                                </div>
                                <div class="mt-2">Durata:{{$animeItem['duration']}}</div>
                                <div class="mt-2">Punteggio:{{$animeItem['score']}}</div>
                                <div class="mt-2">Riassunto:{{$animeItem['synopsis']}}</div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


</x-main>