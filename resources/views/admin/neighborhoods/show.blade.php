@extends('admin.layouts.layout')

@section('streets')
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
                            <a href="{{ route('admin.neighborhoods.index') }}" class="btn btn-primary"
                                style="position:absolute; right:50;">Back</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <td>Mahalla : </td>
                                            <td><b>{{ $neighborhood->title }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Tuman : </td>
                                            <td><b>{{ $neighborhood->noun }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Viloyat : </td>
                                            <td><b>{{ $neighborhood->name }}</b></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection