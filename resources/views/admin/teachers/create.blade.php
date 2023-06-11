@extends('admin.layouts.layout')

@section('teachers')
    active
@endsection

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="section">
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Yangi o'qituvchi qo'shish</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="name">
                                        @error('name')
                                        {{$messege}}
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row mb-4">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">img</label>
                                  <div class="col-sm-12 col-md-7">
                                      <input type="file" class="form-control" name="img">
                                      @error('img')
                                      {{$messege}}
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">direction</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="direction">
                                    @error('direction')
                                    {{$messege}}
                                    @enderror
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">telegram</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="telegram">
                                        @error('telegram')
                                        {{$messege}}
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">instegram</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="instegram">
                                            @error('instegram')
                                            {{$messege}}
                                            @enderror
                                        </div>

                                   <div class="form-group row mb-4">
                                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">faceebook</label>
                                      <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" name="faceebook">
                                                @error('faceebook')
                                                {{$messege}}
                                                @enderror
                                     </div>

                                     <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">job</label>
                                         <div class="col-sm-12 col-md-7">
                                                   <input type="text" class="form-control" name="job">
                                                   @error('job')
                                                   {{$messege}}
                                                   @enderror
                                        </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
