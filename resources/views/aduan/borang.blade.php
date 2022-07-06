<div class="mb-3">
    <label class="form-label">Nama Pengadu</label>
    <input type="text" class="form-control" name="nama_pengadu" value="{{ $aduan->nama_pengadu ?? auth()->user()->name ?? old('nama_pengadu') }}">
</div>

<div class="mb-3">
    <label class="form-label">Email Pengadu</label>
    <input type="email" class="form-control" name="email_pengadu" value="{{ $aduan->email_pengadu ?? auth()->user()->email ?? old('email_pengadu') }}">
</div>
<div class="mb-3">
    <label class="form-label">Aduan</label>
    <textarea name="aduan" class="form-control">{{ $aduan->aduan ?? old('aduan') }}</textarea>
</div>
<input type="hidden" name="user_id" value="{{ auth()->id() }}">
