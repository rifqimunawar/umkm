@extends('users::layouts.master')

@section('module-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Datetime</th>
                  <th>Tools</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ substr($item->user_agent, 0, 80) }} </td>
                    <td>{{ $item->activity }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
