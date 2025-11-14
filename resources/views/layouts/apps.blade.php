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
        
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div
                id="toastSuccess"
                class="toast toast-success"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
                >
                <div class="toast-header">
                <i class="bi bi-circle me-2"></i>
                <strong class="me-auto">Success</strong>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                ></button>
                </div>
                <div class="toast-body">
                    @if(session('success'))
                        {{ session('success') }}
                    @endif
                </div>
            </div>
             <div
                id="toastDanger"
                class="toast toast-danger"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
                >
                <div class="toast-header">
                    <i class="bi bi-circle me-2"></i>
                    <strong class="me-auto">Eror</strong>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="toast"
                        aria-label="Close"
                        ></button>
                    </div>
                <div class="toast-body">
                @if(session('error'))
                    {{ session('error') }}
                @endif    
                </div>
            </div>
        </div>

    </div>


@include('layouts.js')
@stack('scripts')
</body>
</html>