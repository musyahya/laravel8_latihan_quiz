@if ($tambah)
    <div class="modal fade show" id="modal" style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Murid</h4>
              <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="nama">Nama Murid</label>
                  <input wire:model="nama" type="text" id="nama" class="form-control">
                   @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input wire:model="email" type="email" id="email" class="form-control">
                   @error('email') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input wire:model="password" type="password" id="password" class="form-control">
                   @error('password') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="password_confirmation">Ulangi Password</label>
                  <input wire:model="password_confirmation" type="password" id="password" class="form-control">
                   @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button wire:click="simpan" type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
@endif