@extends('installer::layouts.master')

@section('title', trans('installer_messages.permissions.title'))
@section('container')
    @if (isset($permissions['errors']))
        <div class="alert alert-danger">Please fix the below error and the click  {{ trans('installer_messages.checkPermissionAgain') }}</div>
    @endif
    <ul class="list-group">
        @foreach($permissions['permissions'] as $permission)
        <li class="list-group-item position-relative">
           <span> {{ $permission['folder'] }}</span>
            <div class="text-sm  position-absolute top-0 end-0 h-100 d-flex align-items-center justify-content-center gap-1 px-2">

                 @if($permission['isSet'])
                    <span class="text-success">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path   d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            </span>
                @else
                    <span class="text-danger">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            </span>
                @endif
                {{ $permission['permission'] }}</div>

        </li>
        @endforeach
    </ul>


    <div class="text-center mt-4">
        @if ( ! isset($permissions['errors']))
            <a class="btn btn-sm btn-primary" href="{{ route('Installer::database') }}">
                {{ trans('installer_messages.next') }}
            </a>
        @else
            <a class="btn btn-sm btn-primary" href="javascript:window.location.href='';">
                {{ trans('installer_messages.checkPermissionAgain') }}
            </a>
        @endif
    </div>
@stop
