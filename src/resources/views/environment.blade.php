@extends('installer::layouts.master')

@section('title', trans('installer::installer_messages.environment.title'))
@section('container')
    @if(session()->has('message'))
        <div class="alert alert-{{ session('message')['status'] === 'success'?'success':'danger' }} alert-dismissible fade show" role="alert">
            {{ session('message')['message'] }}
        </div>
    @endif
    <form method="post" class="" action="{{ route('Installer::environment.store') }}" >
        @csrf
        <div class="mb-3">
            <label class="form-label">Hostname</label>
            <input type="text" name="hostname" class="form-control {{$errors->has('hostname')?'is-invalid':''}}"  value="{{old('hostname', 'localhost')}}">
            @if($errors->has('hostname'))
                <div class="invalid-feedback">
                    {{ $errors->first('hostname') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" value="{{old('username')}}">
            @if($errors->has('username'))
                <div class="invalid-feedback">
                    {{ $errors->first('username') }}
                </div>
                @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password" value="{{old('password')}}">
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
                @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Database</label>
            <input type="text" name="database" class="form-control {{$errors->has('database')?'is-invalid':''}}" value="{{old('database')}}">
            @if($errors->has('database'))
                <div class="invalid-feedback">
                    {{ $errors->first('database') }}
                </div>
                @endif
        </div>
        <div class="text-center">
            <button class="btn btn-sm btn-primary"  >
                {{ trans('installer::installer_messages.next') }}
            </button>
        </div>
    </form>

@stop
