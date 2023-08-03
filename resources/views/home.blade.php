<x-main>

    <x-slot:title>Blog | HomePage</x-slot>

        <div class="container mt-5">
        
            <h1>{{env('APP_NAME')}}</h1>
            <!-- <h2>{{config('app.name')}}</h2> -->
            <img class="img-fluid" src="https://www.ionos.it/digitalguide/fileadmin/DigitalGuide/Teaser/blog-t.jpg" alt="">
            <livewire:counter />
        </div>

</x-main>