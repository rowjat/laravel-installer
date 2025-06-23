@extends('installer::layouts.master')

@section('title', trans('installer::installer_messages.welcome.title'))
@section('container')
    <p class=" text-center">{{ trans('installer_messages.welcome.message') }}</p>
    <div class="text-center mt-4">
        <a href="{{ route('Installer::environment') }}" class="btn btn-sm btn-primary">{{ trans('installer_messages.next') }}</a>
    </div>
@stop
