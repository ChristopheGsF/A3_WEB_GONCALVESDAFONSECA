@extends('admin.index')
@section('table')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Pdf</th>
                                <th>isAdmin</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            @if(isset($users))
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><img src="{{asset($user->avatar)}}" alt="avatar_user" height="42" width="42"></td>
                                        <td>{{$user->name}}</td>
                                        <td><a href={{asset($user->file)}}>PDF</a></td>
                                        <td>
                                            @if (!$user->isAdmin)
                                                <form action='{{ route('admin.edit', ['id' => $user->id]) }}' method="post">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                    <button type="submit" class="btn btn-warning"> Up to Admin </button>
                                                </form>
                                            @else
                                                <form action='{{ route('admin.edit', ['id' => $user->id]) }}' method="post">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                    <button type="submit" class="btn btn-danger"> Downgrade </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <form action='{{ route('admin.delete', ['id' => $user->id]) }}' method="post">
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                <button type="submit" class="btn btn-danger"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
