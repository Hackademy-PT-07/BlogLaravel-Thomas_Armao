<x-main>

    <x-slot:title>Anime Index</x-slot>

    <div class="container mt-5">
        <h1>Anime Index</h1>

        <div class="mt-5">
            @foreach($index as $genre)
                <a href="{{ route('anime.byGenres', $genre['mal_id'])}}">[{{$genre['mal_id']}}] {{$genre['name']}} ({{$genre['count']}})</a><br>
            @endforeach
        </div>
    </div>


</x-main>