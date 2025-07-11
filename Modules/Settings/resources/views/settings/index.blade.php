@extends('settings::layouts.master')

@section('module-content')
  <div class="row mb-3">
    <!-- BEGIN col-6 -->
    <div class="col-xl-6">
      <!-- BEGIN panel -->
      <div class="panel panel-inverse" data-sortable-id="form-stuff-11">
        <!-- BEGIN panel-heading -->
        <div class="panel-heading">
          <h4 class="panel-title">{{ $title }}</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                class="fa fa-times"></i></a>
          </div>
        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
          <form action="{{ route('settings.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('put')
            <fieldset>
              <legend class="mb-3">Pengaturan Website</legend>

              <!-- Nama Website -->
              <div class="mb-3">
                <label class="form-label" for="name">Nama Instansi</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Nama Website"
                  required value="{{ $data->name }}" />
              </div>

              <!-- Alamat -->
              <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Alamat" required
                  value="{{ $data->alamat }}" />
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                  value="{{ $data->email }}" />
              </div>

              <!-- Phone -->
              <div class="mb-3">
                <label class="form-label" for="phone">Telepon</label>
                <input class="form-control" type="text" id="phone" name="phone" placeholder="Nomor Telepon"
                  value="{{ $data->phone }}" />
              </div>

              <!-- Base URL -->
              <div class="mb-3">
                <label class="form-label" for="base_url">URL Dasar</label>
                <input class="form-control" type="url" id="base_url" name="base_url"
                  placeholder="https://example.com" value="{{ $data->base_url }}" />
              </div>

              <!-- Logo -->
              <div class="mb-3">
                <label class="form-label" for="logo">Logo</label><br>
                @if ($data->logo)
                  <img id="preview-logo-old" src="{{ asset('img/' . $data->logo) }}" alt="Logo Lama" class="mb-2"
                    style="max-height: 100px;">
                @endif
                <img id="preview-logo" class="mb-2 d-block" style="max-height: 100px; display: none;">
                <input class="form-control" type="file" id="logo" name="logo" accept="image/*"
                  onchange="previewImage(event, 'preview-logo')" />
              </div>

              <!-- Favicon -->
              <div class="mb-3">
                <label class="form-label" for="favicon">Favicon</label><br>
                @if ($data->favicon)
                  <img id="preview-favicon-old" src="{{ asset('img/' . $data->favicon) }}" alt="Favicon Lama"
                    class="mb-2" style="max-height: 50px;">
                @endif
                <img id="preview-favicon" class="mb-2 d-block" style="max-height: 50px; display: none;">
                <input class="form-control" type="file" id="favicon" name="favicon" accept="image/*"
                  onchange="previewImage(event, 'preview-favicon')" />
              </div>

              <!-- Background -->
              <div class="mb-3">
                <label class="form-label" for="background">Background</label><br>
                @if ($data->background)
                  <img id="preview-background-old" src="{{ asset('img/' . $data->background) }}" alt="Background Lama"
                    class="mb-2" style="max-height: 150px;">
                @endif
                <img id="preview-background" class="mb-2 d-block" style="max-height: 150px; display: none;">
                <input class="form-control" type="file" id="background" name="background" accept="image/*"
                  onchange="previewImage(event, 'preview-background')" />
              </div>

              <!-- Deskripsi -->
              <div class="mb-3">
                <label class="form-label" for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" placeholder="Deskripsi Website">{{ $data->description }}</textarea>
              </div>

              <!-- Sosial Media -->
              <div class="mb-3">
                <label class="form-label" for="social_facebook">Facebook</label>
                <input class="form-control" type="url" id="social_facebook" name="social_facebook"
                  placeholder="https://facebook.com/username" value="{{ $data->social_facebook }}" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="social_twitter">Twitter</label>
                <input class="form-control" type="url" id="social_twitter" name="social_twitter"
                  placeholder="https://twitter.com/username" value="{{ $data->social_twitter }}" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="social_instagram">Instagram</label>
                <input class="form-control" type="url" id="social_instagram" name="social_instagram"
                  placeholder="https://instagram.com/username" value="{{ $data->social_instagram }}" />
              </div>


              <!-- Buttons -->
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary w-100px">Simpan</button>
                <a href="javascript:history.back();" class="btn btn-default w-100px">Kembali</a>
              </div>
            </fieldset>
          </form>

        </div>
        <!-- END panel-body -->
        <!-- BEGIN hljs-wrapper -->
        {{-- <div class="hljs-wrapper">
                    <pre><code class="html" data-url="../assets/data/form-elements/code-11.json"></code></pre>
                </div> --}}
        <!-- END hljs-wrapper -->
      </div>
      <!-- END panel -->
    </div>
    <!-- END col-6 -->
  </div>

  <script>
    function previewImage(event, previewId) {
      const input = event.target;
      const preview = document.getElementById(previewId);
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection
