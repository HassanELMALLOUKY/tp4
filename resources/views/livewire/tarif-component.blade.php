
<div>
    <div class="row">
        <div class="form col-12">
            <h3 class="text-center">Ajouter un tarif:</h3>
            <form method="post">
                <div class="mb-3">
                    <label for="marque" class="form-label">Tar Description</label>
                    <input type="text" class="form-control" wire:model="state.Tar_Description"  placeholder="">
                    @error('Tar_Description') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Tar Euro</label>
                    <input type="number" class="form-control" wire:model="state.Tar_Euro" placeholder="">
                    @error('Tar_Euro') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
        </div>
        <div class=" col-12">
            <h3 class="text-center">Liste des Tarifs</h3>
            <table id="agrs">
                <thead>
                <tr>
                    <th scope="col">Tar Description</th>
                    <th scope="col">Tar Euro</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trfs as $trf)
                    <tr>
                        <th scope="row">{{ $trf['Tar_Description'] }}</th>
                        <td>{{ $trf['Tar_Euro'] }}</td>
                        <td>

                            <button type="button" wire:click.prevent="edit({{ $trf['Tar_Description'] }})" class="btn btn-warning btn-sm">Modifier</button>
                            <button type="button" wire:click.prevent="delete()" class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


