<h2>Edit Divisi</h2>

<form action="/divisi/{{ $data->id }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama_divisi" value="{{ $data->nama_divisi }}"><br><br>
<input type="text" name="ketua" value="{{ $data->ketua }}"><br><br>
<input type="text" name="keterangan" value="{{ $data->keterangan }}"><br><br>

<button>Update</button>
</form>
