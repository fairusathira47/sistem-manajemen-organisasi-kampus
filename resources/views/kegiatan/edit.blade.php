<h2>Edit Kegiatan</h2>

<form action="/kegiatan/{{ $data->id }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama_kegiatan" value="{{ $data->nama_kegiatan }}"><br><br>
<input type="date" name="tanggal" value="{{ $data->tanggal }}"><br><br>
<input type="text" name="lokasi" value="{{ $data->lokasi }}"><br><br>
<input type="text" name="deskripsi" value="{{ $data->deskripsi }}"><br><br>

<button>Update</button>
</form>