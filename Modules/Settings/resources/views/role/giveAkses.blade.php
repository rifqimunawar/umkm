@extends('settings::layouts.master')
@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
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
    {{-- <div
            style="display: flex; justify-content: space-between; align-items: center; margin-right: 15px;margin-top:10px;margin-left:15px">
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Tambah &ensp;<i class="fa fa-plus-square"
                    aria-hidden="true" style="font-size: 12px"></i></a>
            <div style="display: flex; gap: 10px;">
                <a href="" class="btn btn-warning btn-sm">Export XLS &ensp;<i class="fa fa-file-excel"
                        style="font-size: 12px"></i></a>
                <a href="" class="btn btn-warning btn-sm">Print &ensp; <i class="fa fa-print"
                        style="font-size: 12px"></i></a>
                <a href="" class="btn btn-warning btn-sm">Export PDF &ensp; <i class="fa fa-file-pdf"
                        style="font-size: 12px"></i></a>

            </div>
        </div> --}}

    <!-- END panel-heading -->
    <!-- BEGIN panel-body -->
    <div class="panel-body">
      <form action="{{ route('role.giveAkses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <table width="100%" class="table table-striped table-bordered align-middle text-nowrap">
          <thead>
            <tr>
              <th width="1%"></th>
              <th class="text-nowrap">Menu / Modules</th>
              <th class="text-nowrap">Akses</th>
            </tr>
          </thead>
          <tbody>

            @php
              $menuByParent = [];
              foreach ($dataMenu as $item) {
                  $menuByParent[$item->parent_id][] = $item;
              }

              function renderMenuItems($parentId, $menuByParent, $current_menu_ids, &$iteration = 1, $level = 0)
              {
                  if (!isset($menuByParent[$parentId])) {
                      return;
                  }

                  foreach ($menuByParent[$parentId] as $item) {
                      $indent = str_repeat('&emsp;&emsp;', $level);
                      $prefix = $parentId === null ? '#' : $indent;

                      echo '<tr class="odd gradeX">';
                      echo '<td width="1%" class="fw-bold">' . $iteration++ . '</td>';
                      echo '<td>' . $prefix . ' ' . $item->title . '</td>';
                      echo '<td>';
                      echo '<div class="form-check form-switch mb-2">';
                      echo '<input class="form-check-input" type="checkbox" id="menu_' .
                          $item->id .
                          '" name="menu_ids[]" value="' .
                          $item->id .
                          '" ' .
                          (in_array($item->id, $current_menu_ids) ? 'checked' : '') .
                          '>';
                      echo '<label class="form-check-label" for="menu_' . $item->id . '">Akses</label>';
                      echo '</div>';
                      echo '</td>';
                      echo '</tr>';

                      renderMenuItems($item->id, $menuByParent, $current_menu_ids, $iteration, $level + 1);
                  }
              }

              $iteration = 1;
            @endphp

            @php renderMenuItems(null, $menuByParent, $current_menu_ids, $iteration); @endphp



          </tbody>
        </table>
        <div class="d-flex justify-content-center">

          <input type="hidden" name="role_id" value="{{ $dataRole->id }}">

          <a href="" class="btn btn-warning" style="margin: 1rem">Kembali</a>
          <button type="submit" class="btn btn-primary" style="margin: 1rem">Simpan</button>
        </div>


      </form>
    </div>
    <!-- END panel-body -->
  </div>
  <!-- END panel -->
@endsection
