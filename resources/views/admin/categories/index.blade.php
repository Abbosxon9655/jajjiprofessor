@extends('admin.layouts.layout')

@section('teachers')
    active
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>category</h4>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"
                                style="position:absolute; right:50;">Create</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>category</th>
                                            <th>maqola</th>
                                            <th>action</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($categories) == 0)
                                            <tr>
                                                <td colspan="5" class="h5 text-center text-muted">Ma'lumot qo'shilmagan
                                                </td>
                                            </tr>
                                        @endif

                                        @foreach ($categories as $item)
                                            <tr>
                                                <td>
                                                    {{ ++$loop->index }}
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->blades->name ?? 'boglanmagan' }}</td>


                                                {{-- <td>@foreach($item->blades as $item)
                                                    {{ $item->title }}@endforeach
                                                </td>
                                               --}}


                                                <td>
                                                    <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <a href="{{ route('admin.categories.show', $item->id) }}" class="btn btn-info"><ion-icon class="fas fa-info-circle"></ion-icon></a>

                                                    <a href="{{ route('admin.categories.edit', $item->id) }}" class="btn btn-primary"><ion-icon class="far fa-edit"></ion-icon></a>

                                                    <button class="btn btn-danger" onclick="return confirm('Rostdan o`chirmoqchimisiz ?')"><ion-icon class="fas fa-times"></ion-icon></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection