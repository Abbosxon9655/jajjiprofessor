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
              <a href="{{ route('admin.articles.index') }}" class="btn btn-primary" style="position:absolute; right:50;">Back</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <td>name : </td>
                        <td><b>{{ $article->name }}</b></td>
                    </tr>

                    <tr>
                      <td>img : </td>
                      <td><img src="/imeges/{{ $article->img }}" width="100" alt=""></td>
                  </tr>

                  <tr>
                    <td>job : </td>
                    <td>{{ $article->job }}"</td>
                </tr>

                  <tr>
                    <td>direction : </td>
                    <td><b>{{ $article->shor }}</b></td>
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
