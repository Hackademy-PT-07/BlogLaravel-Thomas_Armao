<div>
    <h3 class="mb-4">Utenti</h3>

    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" wire:click="editUser({{ $user->id }})">modifica</button>
                        <button class="btn btn-sm btn-danger" wire:click="deleteUser({{ $user->id }})">cancella</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
