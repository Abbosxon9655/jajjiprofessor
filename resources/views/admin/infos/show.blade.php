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
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary"
                                style="position:absolute; right:50;">Back</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <td>title : </td>
                                            <td><b>{{ $info->title }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>short_content : </p>
                                            </td>
                                            <td><b>{{ $info->short_content }}</b></td>
                                        </tr>
                                        <tr>
                                          <td>icon : </td>
                                          <td><b>{{ $info->icon }}</b></td>
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
