@extends('installer::layouts.master')

@section('title', trans('installer::installer_messages.permissions.title'))
@section('container')
    <p class="text-center mb-4">The installer needs to check if the following folders have the correct permissions.</p>
    <ul class="list-group mb-4">
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

    <div class="status-message">
        @if (isset($permissions['errors']))
            <div class="alert alert-danger">
                Some folders don't have the required permissions. Please fix the issues before proceeding.
            </div>
        @else
            <div class="alert alert-success">
                All folder permissions are correct! You can proceed to the next step.
            </div>
        @endif
    </div>

    @if (isset($permissions['errors']))
        <div class="terminal-command">
            <h5 class="text-muted">Terminal Command</h5>
            <span class="mb-1">If you have terminal access, run the following command on terminal</span>
            <p style="background: #f7f7f9;padding: 10px; border-radius: 4px; font-family: monospace;">
                chmod -R 775 storage/app/ storage/framework/ storage/logs/ bootstrap/cache/
            </p>
        </div>
    @endif
    <div class="text-center mt-4">
{{--        <ul class="hide">--}}
{{--            <ol>Please wait a few moments as the application prepares for you. This may take a minute or two depending on your server configuration.</ol>--}}
{{--        </ul>--}}
        @if ( ! isset($permissions['errors']))
            <a class="btn btn-sm btn-primary" href="{{ route('Installer::database') }}">
                {{ trans('installer::installer_messages.next') }}
            </a>
        @else
            <a class="btn btn-sm btn-primary" href="javascript:window.location.href='';">
                {{ trans('installer::installer_messages.checkPermissionAgain') }}
            </a>
        @endif
    </div>
@stop
