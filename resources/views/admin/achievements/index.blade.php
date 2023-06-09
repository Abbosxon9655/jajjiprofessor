@extends('admin.layouts.layout')

@section('infos')
    active
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header"><strong>Achievement</strong></div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

            <div class="card-header nav justify-content-center">
                <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary"
                    style="position:absolute; right:50;">Create</a>
            </div><br>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>status</th>
                            <th>img</th>
                            <th>name</th>
                            <th>content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($achievements) == 0)
                            <tr>
                                <td colspan="5" class="h5 text-center text-muted">Ma'lumot
                                    qo'shilmagan
                                </td>
                            </tr>
                        @endif

                        @foreach ($achievements as $achievement)
                            <tr>
                                <td>
                                    {{ ++$loop->index }}
                                </td>
                                <td>{{ $achievement->status }}</td>
                                <td><img src="/imeges/{{ $achievement->img }}" width="100" alt=""></td>
                                <td>{{ $achievement->name }}</td>
                                <td>{{ $achievement->content }}</td>
                              
                               

                                <td>
                                    <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.achievements.show', $achievement->id) }}" class="btn btn-info">
                                            <ion-icon class="fas fa-info-circle"></ion-icon>
                                        </a>
                                        <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="btn btn-primary">
                                            <ion-icon class="far fa-edit"></ion-icon>
                                        </a>
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Rostdan o`chirmoqchimisiz ?')">
                                            <ion-icon class="fas fa-times"></ion-icon>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- {{ $infos->links() }} --}}
            </div>
        </div>

    </div>
@endsection