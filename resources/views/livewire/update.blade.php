<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Roles') }}</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="name">
                    </div>
                    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
