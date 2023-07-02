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
                <a class="create__btn" href="{{route('admin.achievements.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

            </div>
            <div class="card-body">
              <form action="{{ route('admin.achievements.update', $achivement->id) }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                @method('PUT')

                <strong> status :</strong>
                <input type="text" name="status" value="{{ $achievement->status }}" class="form-control"> <br>

                <strong> img :</strong>
                <input type="text" name="name" value="{{ $achievement->img }}" class="form-control"> <br>

                <strong> name :</strong>
                <input type="text" name="surname" value="{{ $achievement->name }}" class="form-control"> <br>

                <strong> content :</strong>
                <input type="text" name="content" value="{{ $achievement->content }}" class="form-control"> <br>

               
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
