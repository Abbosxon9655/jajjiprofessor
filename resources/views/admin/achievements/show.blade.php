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
                            <a href="{{ route('admin.achivements.index') }}" class="btn btn-primary"
                                style="position:absolute; right:50;">Back</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <td>status : </td>
                                            <td><b>{{ $achivement->status }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>name : </p>
                                            </td>
                                            <td><b>{{ $achivement->name }}</b></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p>surname : </p>
                                            </td>
                                            <td><b>{{ $achivement->surname }}</b></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p>content : </p>
                                            </td>
                                            <td><b>{{ $achivement->content }}</b></td>
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
