<div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <form wire:submit.prevent="submit">
                    <div class="card-header">
                        <h4>Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-12">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" wire:model.defer="form.name">
                        </div>
                        <div class="form-group col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model.defer="form.email">
                        </div>
                        <div class="form-group col-12">
                            <label>Password</label>
                            <input type="password" class="form-control" wire:model.defer="form.password">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-secondary" wire:click="cancelForm" type="button">Cancel</button>
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
