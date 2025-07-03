<div class="mb-3">
    <label>Nama Tanaman</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $tanaman->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $tanaman->deskripsi ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Manfaat</label>
    <input type="text" name="manfaat" class="form-control" value="{{ old('manfaat', $tanaman->manfaat ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Asal Daerah</label>
    <input type="text" name="asal_daerah" class="form-control" value="{{ old('asal_daerah', $tanaman->asal_daerah ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Foto (Opsional)</label>
    <input type="file" name="foto" class="form-control">
    @if(isset($tanaman) && $tanaman->foto)
        <img src="{{ asset('storage/' . $tanaman->foto) }}" width="100" class="mt-2">
    @endif
</div>
