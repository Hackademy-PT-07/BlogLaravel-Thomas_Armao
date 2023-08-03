<div class="bg-light p-4 rounded">
    <div class="mb-4">
        @if($user->id)
        <h3>Modifica Utente</h3>
        <button class="btn btn-sm btn-primary" wire:click="newUser">Nuovo Utente</button>
        @else
        <h3>Crea Utente</h3>
        @endif  
    </div>

    <x-success />

    <form wire:submit.prevent="store">
        <div class="row g-3">
            <div class="col-12">
                <label for="name">Nome</label>
                <input type="text" class="form-control" wire:model="user.name">
                @error('user.name') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" wire:model.lazy="user.email">
                @error('user.email') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" wire:model="password">
                @error('password') <span class="small text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
</div>
