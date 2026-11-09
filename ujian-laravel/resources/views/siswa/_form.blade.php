@csrf
@php $v = fn ($f) => old($f, $siswa->$f ?? ''); @endphp
<div class="grid">
    <label>Kelas *
        <select name="kelas_id" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" @selected($v('kelas_id') == $k->id)>{{ $k->nama_kelas }} ({{ $k->tahun_ajaran }})</option>
            @endforeach
        </select>
    </label>
    <label>NIS *
        <input name="nis" value="{{ $v('nis') }}" maxlength="20" required>
    </label>
    <label>Nama Lengkap *
        <input name="nama_lengkap" value="{{ $v('nama_lengkap') }}" maxlength="100" required>
    </label>
    <label>Jenis Kelamin *
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="L" @selected($v('jenis_kelamin') === 'L')>Laki-laki</option>
            <option value="P" @selected($v('jenis_kelamin') === 'P')>Perempuan</option>
        </select>
    </label>
    <label>Tempat Lahir
        <input name="tempat_lahir" value="{{ $v('tempat_lahir') }}" maxlength="100">
    </label>
    <label>Tanggal Lahir
        <input type="date" name="tanggal_lahir" value="{{ $v('tanggal_lahir') }}">
    </label>
    <label class="full">Alamat
        <textarea name="alamat" rows="3">{{ $v('alamat') }}</textarea>
    </label>
    <label>No. HP
        <input name="no_hp" value="{{ $v('no_hp') }}" maxlength="20">
    </label>
    <label>Email
        <input type="email" name="email" value="{{ $v('email') }}" maxlength="255">
    </label>
    <label>Asal Sekolah *
        <input name="asal_sekolah" value="{{ $v('asal_sekolah') }}" maxlength="150" required>
    </label>
    <label>Jurusan *
        <input name="jurusan" value="{{ $v('jurusan') }}" maxlength="100" required>
    </label>
    <label>Nama Ayah
        <input name="nama_ayah" value="{{ $v('nama_ayah') }}" maxlength="100">
    </label>
    <label>Nama Ibu
        <input name="nama_ibu" value="{{ $v('nama_ibu') }}" maxlength="100">
    </label>
    <label>No. HP Orang Tua/Wali
        <input name="no_hp_wali" value="{{ $v('no_hp_wali') }}" maxlength="20">
    </label>
    <label>Status *
        <select name="status" required>
            <option value="Aktif" @selected(($v('status') ?: 'Aktif') === 'Aktif')>Aktif</option>
            <option value="Nonaktif" @selected($v('status') === 'Nonaktif')>Nonaktif</option>
        </select>
    </label>
</div>
<div class="actions">
    <button class="btn primary">Simpan</button>
    <a href="{{ route('siswa.index') }}" class="btn">Batal</a>
</div>
