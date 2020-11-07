  <!-- Modal TULIS-->
  <div class="modal fade" id="mdcreate" tabindex="-1" role="dialog" aria-labelledby="mdcreate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title" id="mdcreatetitle">Tulis Konten</h5>
        </div>
        <div class="modal-body">
          <form class="" action="{{ route('article.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="title">Judul konten</label>
                <input type="text" class="form-control judul" id="title" name="judul" aria-describedby="slugdesc" placeholder="Tulis judul konten">
                <small id="slugdesc" class="form-text text-muted">Url akses konten: {{route('home')}}/<i class="slug-prev"></i></small>
              </div>
              <input type="text" name="slug" class="slug" value="" style="display:none">
              <div class="form-group">
                <label for="kontributor">Kontributor</label>
                <input type="text" class="form-control" id="kontributor" name="kontributor" placeholder="Tulis nama pena/ karya anda">
              </div>
              <div class="form-group">
                <label for="summernote">Isi uraian/ artikel</label>
                <textarea id="summernote" name="konten" required></textarea>
              </div>
              <div class="form-group">
                <label for="jenis">Kategori</label>
                <select class="form-control" name="kategori" id="jenis" required>
                  <option selected disabled>-Pilih Jenis Karya-</option>
                  <option value="karya-sastra">Karya Sastra</option>
                  <option value="karya-visual">Karya Visual</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" aria-describedby="taged" placeholder="Tulis judul konten">
                <small id="taged" class="form-text text-muted">Pisahkan tag dengan titik koma (;)</small>
              </div>
              <div class="form-group">
                <label for="tumbnail">Karya/ Gambar pratinjau</label>
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
