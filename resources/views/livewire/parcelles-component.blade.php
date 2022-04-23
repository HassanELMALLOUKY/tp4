<div>
    <div class="row">
        <div class="form col-12">
            <h3 class="text-center">Ajouter une parcelle:</h3>
            <form>
                <div class="mb-3">
                    <label for="marque" class="form-label">Nom</label>
                    <input type="text" class="form-control" wire:model="state.Par_Nom" placeholder="">
                    @error('nom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Lieu</label>
                    <input type="text" class="form-control" wire:model="state.Par_Lieu" placeholder="">
                    @error('lieu') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Superficie</label>
                    <input type="number" class="form-control" wire:model="state.Par_Superficie" placeholder="">
                    @error('superficie') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Agr id</label>
                    <input type="number" class="form-control" wire:model="state.agriculteur_id" placeholder="">
                    @error('agriculteur_id') <span class="text-danger">{{ $message }}</span>@enderror
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
            <h3>List des parcelles</h3>
            <table id="agrs">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Superficie</th>
                    <th scope="col">Agriculteur ID</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($parcelles as $parcelle)
                    <tr>
                        <th scope="row">{{ $parcelle['id'] }}</th>
                        <td>{{ $parcelle['Par_Nom'] }}</td>
                        <td>{{ $parcelle['Par_Lieu'] }}</td>
                        <td>{{ $parcelle['Par_Superficie'] }}</td>
                        <td>{{ $parcelle['agriculteur_id'] }}</td>
                        <td>
                            <button type="button" wire:click.prevent="edit({{ $parcelle['id'] }})" class="btn btn-warning btn-sm">Modifier</button>
                            <button type="button" wire:click.prevent="delete({{ $parcelle['id'] }})" class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
