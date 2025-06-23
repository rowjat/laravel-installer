<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ trans('installer_messages.title') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('vendor/installer/img/favicon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <style>
        body{
            background-repeat: no-repeat;
            background-size: 100dvh 100vw;
            height: 100dvh;
        }
        .step {
            list-style: none;
        }

        .step__divider, .step__icon {
            background-color: #f3f4f9;
        }

        .step__divider {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 60px;
            height: 3px;
        }

        .step__divider:first-child, .step__divider:last-child {
            -webkit-flex: 1 0 auto;
            -ms-flex: 1 0 auto;
            flex: 1 0 auto;
        }

        .step__icon {
            font-style: normal;
            width: 40px;
            height: 40px;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            border-radius: 50%;
            color: var(--bs-primary);
        }

        .step__item.active .step__icon,
        .step__item.active ~ .step__item .step__icon
        {
            background-color: var(--bs-primary);
            color: #fff;
        }
        .step__item.active ~ .step__divider,

        .step__divider.active
        {
            background-color: var(--bs-primary);
        }

    </style>
    @yield('style')

</head>
<body class="p-10 d-flex flex-column justify-content-center align-items-center" style="background: url({{ asset('vendor/installer/img/background.jpeg') }});">
<div class="row w-100 justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 m-4">
            <div class="card-body p-0">
                <div class="py-4 d-flex flex-column justify-content-center align-items-center">
                    <img class="mb-4" src="{{ asset(config('installer.logo.path')) }}" height="40px" alt="{{ config('installer.logo.alt') }}">
                    <h1 class="h2 text-center fw-bold text-muted">@yield('title')</h1>
                </div>
                <ul class="step d-flex flex-row-reverse justify-content-center align-items-center list-style-none p-0">
                    <li class="step__divider {{ isActive('Installer::final') }}"></li>
                    <li class="step__item {{ isActive('Installer::final') }}">
                    <span class="step__icon">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="M480-120q-151 0-255.5-46.5T120-280v-400q0-66 105.5-113T480-840q149 0 254.5 47T840-680v400q0 67-104.5 113.5T480-120Zm0-479q89 0 179-25.5T760-679q-11-29-100.5-55T480-760q-91 0-178.5 25.5T200-679q14 30 101.5 55T480-599Zm0 199q42 0 81-4t74.5-11.5q35.5-7.5 67-18.5t57.5-25v-120q-26 14-57.5 25t-67 18.5Q600-528 561-524t-81 4q-42 0-82-4t-75.5-11.5Q287-543 256-554t-56-25v120q25 14 56 25t66.5 18.5Q358-408 398-404t82 4Zm0 200q46 0 93.5-7t87.5-18.5q40-11.5 67-26t32-29.5v-98q-26 14-57.5 25t-67 18.5Q600-328 561-324t-81 4q-42 0-82-4t-75.5-11.5Q287-343 256-354t-56-25v99q5 15 31.5 29t66.5 25.5q40 11.5 88 18.5t94 7Z"/></svg>
                    </span>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('Installer::permissions') }}">
                    <span class="step__icon">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z"/></svg>
                    </span>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('Installer::requirements') }}">
                   <span class="step__icon">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="m424-318 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/></svg>
                   </span>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('Installer::environment') }}">
                   <span class="step__icon">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z"/></svg>
                   </span>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item {{ isActive('Installer::welcome') }}">
               <span class="step__icon">

<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path
        d="M180-120q-25 0-42.5-17.5T120-180v-76l160-142v278H180Zm140 0v-160h320v160H320Zm360 0v-328L509-600l121-107 190 169q10 9 15 20.5t5 24.5v313q0 25-17.5 42.5T780-120H680ZM120-310v-183q0-13 5-25t15-20l300-266q8-8 18.5-11.5T480-819q11 0 21.5 3.5T520-804l80 71-480 423Z"/></svg>
               </span>
                    </li>
                    <li class="step__divider"></li>
                </ul>

            </div>
            <div class="card-body p-5">
                @yield('container')
            </div>
        </div>
    </div>
</div>
</body>
@yield('scripts')
</html>
