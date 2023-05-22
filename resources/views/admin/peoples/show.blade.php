@extends('admin.layouts.layout')

@section('teachers')
active
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h4>Show Product</h4>
              <a href="{{ route('admin.shows.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <td>name : </td>
                        <td><b>{{ $show->name }}</b></td>
                    </tr>

                    <tr>
                      <td>img : </td>
                      <td><b><img src="/imeges/{{ $show->img }}" width="100" alt=""></b></td>
                  </tr>

                  <tr>
                    <td>direction : </td>
                    <td><b>{{ $show->shortcontent }}</b></td>
                </tr>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
