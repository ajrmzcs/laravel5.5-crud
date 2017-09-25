@extends('layouts.app')

@section('content')
    <div class="row">
        <h4 class="text-center">{{ $title }}</h4>
    </div>
    @if ($errors->any())
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form method="POST" action="{{ $action }}">
                {{ csrf_field() }}
                @isset($put)
                    {{ method_field('PUT') }}
                @endisset
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                           @isset($user->name) value="{{ $user->name }}"  @endisset
                           @if(old('name')!==null) value="{{ old('name') }}"  @endif>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                           @isset($user->email) value="{{ $user->email }}"  @endisset
                           @if(old('email')!==null) value="{{ old('email') }}"  @endif>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address"
                           @isset($user->address) value="{{ $user->address }}"  @endisset
                           @if(old('address')!==null) value="{{ old('address') }}"  @endif">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                    <a href="/" class="btn btn-default btn-sm">Back</span></a>
                </div>
            </form>
        </div>
    </div>

@endsection