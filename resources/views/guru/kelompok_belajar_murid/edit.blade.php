@if ($edit)
    <div class="modal fade show" id="modal" style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Murid</h4>
              <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="murid">Murid</label>
                  <select wire:model="murid" class="form-control" id="murid" multiple>
                    @foreach ($murid_all as $item)
                        @foreach ($kelompok_belajar_murid->user as $user)
                            <option value="{{$item->id}}" {{($item->id == $user->id ? 'selected' : '')}}>{{$item->name}}</option>
                            @break
                        @endforeach
                    @endforeach
                    </select>
                   @error('murid') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button wire:click="update" type="button" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
@endif