@extends('installer::layouts.master')

@section('title', trans('installer::installer_messages.final.title'))
@section('container')
    <p class="text-center my-4">
        {{trans(session('message')['message'])}}
    </p>
    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-sm btn-primary">{{ trans('installer::installer_messages.final.exit') }}</a>
    </div>
@stop
