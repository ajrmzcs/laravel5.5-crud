@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            @if (session('status'))
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row padding-button-new">
        <div class="pull-right">
            <a href="/user/create" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> New User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-responsive table-striped table-condensed">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Address</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->address }}</td>
                        <td class="text-center">
                            <a href="user/{{ $user->id }}/edit" class="btn btn-sm btn-primary pull-right" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                        <td class="text-center">
                            <form action="user/{{ $user->id }}" method="POST">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger pull-right" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="pull-right">
                <p><strong>{{ $users->total() }} records in {{ $users->lastPage() }} pages.</strong></p>
            </div>
            <div class="text-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection