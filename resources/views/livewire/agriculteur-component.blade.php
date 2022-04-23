
<div>
    <div class="row">
        <div class="form col-12">
            <h3 class="text-center">Ajouter un agriculteur:</h3>
            <form method="post">
                <div class="mb-3">
                    <label for="marque" class="form-label">Nom</label>
                    <input type="text" class="form-control" wire:model="state.Agr_Nom"  placeholder="">
                    @error('nom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prenom</label>
                    <input type="text" class="form-control" wire:model="state.Agr_Prn" placeholder="">
                    @error('prenom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Resid</label>
                    <input type="text" class="form-control" wire:model="state.Agr_Resid" placeholder="">
                    @error('resid') <span class="text-danger">{{ $message }}</span>@enderror
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
            <h3 class="text-center">Liste des Agriculteurs</h3>
            <table id="agrs">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Resid</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($agrs as $agr)
                    <tr>
                        <th scope="row">{{ $agr['id'] }}</th>
                        <td>{{ $agr['Agr_Nom'] }}</td>
                        <td>{{ $agr['Agr_Prn'] }}</td>
                        <td>{{ $agr['Agr_Resid'] }}</td>
                        <td>
                            <button type="button" wire:click.prevent="edit({{ $agr['id'] }})" class="btn btn-warning btn-sm">Modifier</button>
                            <button type="button" wire:click.prevent="delete({{ $agr['id'] }})" class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

