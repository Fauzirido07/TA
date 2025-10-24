<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPDB SLB-B Dharma Wanita')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.ico') }}" />

@include('layouts.css')
@stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-0">@yield('title', 'PPDB SLB-B Dharma Wanita')</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>


@include('layouts.js')
@stack('scripts')
</body>
</html>