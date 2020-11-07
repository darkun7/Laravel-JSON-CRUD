  <!-- Modal TULIS-->
  <div class="modal fade" id="mdedit" tabindex="-1" role="dialog" aria-labelledby="mdedit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="mdcreatetitle">Edit Konten</h5>
        </div>
        <div class="modal-body">
          <form class="" action="{{ route('article.update', $edit['slug']) }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
              <div class="form-group">
                <label for="title">Judul konten</label>
                <input type="text" class="form-control judul" id="title" name="judul" aria-describedby="slugdesc" placeholder="Tulis judul konten" value="{{ $edit['judul'] }}" required>
                <small id="slugdesc" class="form-text text-muted">Url akses konten: <i class=""><a href="{{route('home')}}/{{$edit['slug']}}">{{route('home')}}/{{$edit['slug']}}</a></i></small>
              </div>
              <div class="form-group">
                <label for="kontributor">Penyunting</label>
                <input type="text" class="form-control" id="kontributor" name="kontributor" placeholder="Tulis nama pena/ karya anda" aria-describedby="contrb">
                <small id="contrb" class="form-text text-muted">Biarkan kosong jika anda tidak ingin menuliskan nama penyunting<small>
              </div>
              <div class="form-group">
                <label for="summernote">Isi uraian/ artikel</label>
                <textarea id="summernote2" name="konten">{{ $edit['konten'] }}</textarea>
              </div>
              <div class="form-group">
                <label for="jenis">Kategori</label>
                <select class="form-control" name="kategori" id="jenis" required>
                  <option disabled>-Pilih Jenis Karya-</option>
                  <option value="karya-sastra" @if($edit['kategori'] == 'karya-sastra') selected @endif>Karya Sastra</option>
                  <option value="karya-visual" @if($edit['kategori'] == 'karya-visual') selected @endif>Karya Visual</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" aria-describedby="taged" placeholder="Tulis judul konten"  value="{{ $edit['tag'] }}" required>
                <small id="taged" class="form-text text-muted">Pisahkan tag dengan titik koma (;)</small>
              </div>
              <div class="form-group">
                <label for="tumbnail">Karya/ Gambar pratinjau</label>
                <img src="{{asset($edit['tumbnail'])}}" alt="" height="350">
                <input type="file" class="form-control" id="tumbnail" name="tumbnail">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>
