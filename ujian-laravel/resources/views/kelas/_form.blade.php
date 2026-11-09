@csrf
<div class="grid">
    <label>Kode Kelas *
        <input name="kode_kelas" value="{{ old('kode_kelas', $kelas->kode_kelas ?? '') }}" maxlength="20" required>
    </label>
    <label>Nama Kelas *
        <input name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}" placeholder="X RPL 1" maxlength="50" required>
    </label>
    <label>Tingkat *
        <input name="tingkat" value="{{ old('tingkat', $kelas->tingkat ?? '') }}" placeholder="X / XI / XII" maxlength="20" required>
    </label>
    <label>Tahun Ajaran *
        <input name="tahun_ajaran" value="{{ old('tahun_ajaran', $kelas->tahun_ajaran ?? '') }}" placeholder="2026/2027" maxlength="20" required>
    </label>
    <label class="full">Wali Kelas
        <input name="wali_kelas" value="{{ old('wali_kelas', $kelas->wali_kelas ?? '') }}" maxlength="100">
    </label>
</div>
<div class="actions">
    <button class="btn primary">Simpan</button>
    <a href="{{ route('kelas.index') }}" class="btn">Batal</a>
</div>
