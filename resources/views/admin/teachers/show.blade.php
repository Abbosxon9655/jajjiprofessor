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
              <a href="{{ route('admin.teachers.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
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
                    <td><b>{{ $show->direction }}</b></td>
                </tr>

                <tr>
                  <td>telegram : </td>
                  <td><b>{{ $show->telegram }}</b></td>
              </tr>

              <tr>
                <td>inctegram : </td>
                <td><b>{{ $show->inctegram }}</b></td>
            </tr>

            <tr>
              <td>faceebook : </td>
              <td><b>{{ $show->faceebook }}</b></td>
          </tr>

          <tr>
            <td>job : </td>
            <td><b>{{ $show->job }}</b></td>
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
