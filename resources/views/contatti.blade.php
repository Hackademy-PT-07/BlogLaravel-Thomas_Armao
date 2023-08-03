<x-main>

    <x-slot:title>Blog | Contatti</x-slot>

        <div class="container mt-3">
            <div class="mt-4">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h1>Contatti</h1>
                        <p class="lead">{{$text}}</p>
                    
                        @if(session()->has('success'))
                            <x-form-success/>
                        @endif

                        <form action="{{ route('contacts.save') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="">Messaggio</label>
                                    <textarea id="message" name="message" class="form-control" rows="6"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Invia richiesta</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



</x-main>