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

    
      <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>O'zgartirish</h3>
                <a class="create__btn" href="{{route('admin.infos.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

            </div>
            <div class="card-body">
              <form action="{{ route('admin.infos.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                @method('PUT')

                <strong> title :</strong>
                <input type="text" name="title" value="{{ $info->title }}" class="form-control"> <br>

                <strong> short_content :</strong>
                <input type="text" name="short_content" value="{{ $info->short_content }}" class="form-control"> <br>

                <strong> Rasm(png yoki jpg) :</strong>
                <input type="file" name="icon" class="form-control"> <br>

                <input type="submit" value="O'zgartirish">

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
