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
              <a href="{{ route('admin.posts.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <td>name : </td>
                        <td><b>{{ $post->name }}</b></td>
                    </tr>

                    <tr>
                      <td>img : </td>
                      <td><b>{{ $post->img }}</b></td>
                  </tr>

                  <tr>
                    <td>title : </td>
                    <td><b>{{ $post->title }}</b></td>
                </tr>

                <tr>
                  <td>status : </td>
                  <td><b>{{ $post->status }}</b></td>
              </tr>

              <tr>
                <td>age : </td>
                <td><b>{{ $post->age }}</b></td>
            </tr>

            <tr>
              <td>send : </td>
              <td><b>{{ $post->send }}</b></td>
          </tr>

          
          <tr>
            <td>pay : </td>
            <td><b>{{ $post->pay }}</b></td>
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
