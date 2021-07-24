@if ($tambah_soal)
    <div class="modal fade show" id="modal" style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Soal</h4>
              <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label for="soal">Soal</label>
                  <input wire:model="soal" type="text" id="soal" class="form-control">
                   @error('soal') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="pilihan_a">Pilihan A</label>
                  <input wire:model="pilihan_a" type="text" id="pilihan_a" class="form-control">
                   @error('pilihan_a') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="pilihan_b">Pilihan B</label>
                  <input wire:model="pilihan_b" type="text" id="pilihan_b" class="form-control">
                   @error('pilihan_b') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="pilihan_c">Pilihan C</label>
                  <input wire:model="pilihan_c" type="text" id="pilihan_c" class="form-control">
                   @error('pilihan_c') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="pilihan_d">Pilihan D</label>
                  <input wire:model="pilihan_d" type="text" id="pilihan_d" class="form-control">
                   @error('pilihan_d') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="form-group">
                  <label for="pilihan_e">Pilihan E</label>
                  <input wire:model="pilihan_e" type="text" id="pilihan_e" class="form-control">
                   @error('pilihan_e') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <select wire:model="jawaban" class="form-control" id="jawaban">
                        <option disabled selected>Jawaban</option>
                        <option value="pilihan_a">Pilihan A</option>
                        <option value="pilihan_b">Pilihan B</option>
                        <option value="pilihan_c">Pilihan C</option>
                        <option value="pilihan_d">Pilihan D</option>
                        <option value="pilihan_e">Pilihan E</option>
                    </select>
                     @error('jawaban') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button wire:click="format" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button wire:click="simpan" type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endif