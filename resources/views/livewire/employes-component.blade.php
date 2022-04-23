<div>
    <div class="row">
        <div class="form col-12">
            <form method="post">
                <div class="mb-3">
                    <label for="marque" class="form-label">Emp Nss</label>
                    <input type="text" class="form-control" wire:model="state.Emp_Nss" id="nom"  placeholder="">
                    @error('Emp_Nss') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="marque" class="form-label">Nom</label>
                    <input type="text" class="form-control" wire:model="state.Emp_Nom" id="nom"  placeholder="">
                    @error('nom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prenom</label>
                    <input type="text" class="form-control" wire:model="state.Emp_Prn" id="prenom" placeholder="">
                    @error('prenom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Tarif</label>
                    <input type="text" class="form-control" wire:model="state.Emp_Tarif" id="tarif" placeholder="">
                    @error('tarif') <span class="text-danger">{{ $message }}</span>@enderror
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
            <h3>List des employes</h3>
            <table id="agrs">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($empls as $empl)
                    <tr>
                        <th scope="row">{{ $empl['Emp_Nss'] }}</th>
                        <td>{{ $empl['Emp_Nom'] }}</td>
                        <td>{{ $empl['Emp_Prn'] }}</td>
                        <td>{{ $empl['Emp_Tarif'] }}</td>
                        <td>
                            <button type="button" wire:click.prevent="edit({{ $empl['Emp_Nss']  }})" class="btn btn-warning btn-sm">Modifier</button>
                            <button type="button" wire:click.prevent="delete({{ $empl['Emp_Nss']  }})" class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
