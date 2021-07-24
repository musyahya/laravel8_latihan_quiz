@if ($edit)
    <div class="modal fade show" id="modal" style="display: block; padding-right: 17px;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Quiz</h4>
              <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="nama">Nama Quiz</label>
                  <input wire:model="nama" type="text" id="nama" class="form-control">
                   @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button wire:click="update({{$quiz_id}})" type="button" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
@endif