<x-main>
    <x-slot:title>Utenti</x-slot>

    <div class="container mt-5">
        <h1 class="mb-5">Gestione Utenti</h1>
        <div class="row">
            <div class="col-4">
                <livewire:user-form />
            </div>
            <div class="col-8">
            <livewire:users-list />
            </div>
        </div>
    </div>

</x-main>