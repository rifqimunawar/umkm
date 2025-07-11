@extends('settings::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form Elements</div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6 col-lg-4">
                <div class="form-group mb-2">
                  <label for="title">Nama Menu</label>
                  <input type="text" class="form-control" required name="title" id="title"
                    placeholder="Nama Menu" />
                </div>

                <div class="form-group mb-2">
                  <label for="url">URL {{ $dataSettings->base_url }}</label>
                  <input type="text" class="form-control" name="url" id="url" placeholder="URL Menu" />
                </div>

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <a target="_blank" href="https://fontawesome.com/search">Referensi
                    Icon</a>
                  <input type="text" class="form-control" name="icon" id="icon"
                    placeholder="Icon (Opsional)" />
                </div>

                <div class="form-group mb-2">
                  <label for="caret">Tampilkan Caret</label>
                  <select class="form-control" name="caret" id="caret">
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>

                @php
                  function renderSelectOptions($parentId, $menuByParent, $level = 0, $selectedId = null)
                  {
                      if (!isset($menuByParent[$parentId])) {
                          return;
                      }

                      foreach ($menuByParent[$parentId] as $item) {
                          $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
                          $isSelected = $selectedId == $item->id ? 'selected' : '';

                          echo '<option value="' .
                              $item->id .
                              '" ' .
                              $isSelected .
                              '>' .
                              $indent .
                              $item->title .
                              '</option>';

                          renderSelectOptions($item->id, $menuByParent, $level + 1, $selectedId);
                      }
                  }

                  $menuByParent = [];
                  foreach ($dataMenu as $item) {
                      $menuByParent[$item->parent_id][] = $item;
                  }
                @endphp

                <div class="form-group mb-2">
                  <label for="parent_id">Parent Menu</label>
                  <select class="form-control select2" name="parent_id" id="parent_id">
                    <option value="">Pilih Parent Menu</option>
                    @php
                      renderSelectOptions(null, $menuByParent, 0, old('parent_id', $menu->parent_id ?? null));
                    @endphp
                  </select>
                </div>

              </div>

              <div class="card-action">
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                <a href="{{ route('menu.index') }}" class="btn btn-warning btn-sm">Kembali</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
