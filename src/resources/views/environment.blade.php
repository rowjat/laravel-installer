@extends('installer::layouts.master')

@section('title', trans('installer_messages.environment.title'))
@section('container')
    <form method="post" class="" action="{{ route('Installer::environment.store') }}" >
        @csrf
        <div class="mb-3">
            <label class="form-label">Hostname</label>
            <input type="text" name="hostname" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Database</label>
            <input type="text" name="database" class="form-control">
        </div>
        <div class="text-center">
            <button class="btn btn-sm btn-primary"  >
                {{ trans('installer_messages.next') }}
            </button>
        </div>
    </form>
@stop
