<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ MetadataHelper::metadata()->title }}</title>
    <meta name="description" content="{{ MetadataHelper::metadata()->description }}">
    <meta name="keywords" content="{{ MetadataHelper::metadata()->keywords }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- * Favicons --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('assets/icon/favicon-32x32.png') }}">

    {{-- * Icon font --}}
    <link rel="stylesheet" href="{{ asset('assets/webfont/tabler-icons.min.css') }}">

    {{-- * CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- * JQuery --}}
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    {{-- * Animate --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />

    {{-- * Block UI --}}
    <script src="{{ asset('assets/vendor/libs/block-ui/block-ui.js') }}"></script>

    {{-- * Datatable --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    {{-- * Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/themes/material_blue.css') }}" />

    {{-- * Form Validation --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/form-validation/dist/css/formValidation.min.css') }}" />
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    {{-- * Izi Toast --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/izi-toast/css/iziToast.min.css') }}">
    <script src="{{ asset('assets/vendor/libs/izi-toast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/helper/izi-toast.js') }}"></script>

    {{-- * SweetAlert2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    {{-- * Select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

    @yield('custom_head')
</head>

@yield('custom_css')

<body>

    @yield('content')

    {{-- * Axios --}}
    <script src="{{ asset('assets/vendor/libs/axios/axios.min.js') }}"></script>

    {{-- * Block Card --}}
    <script src="{{ asset('assets/helper/block-card.js') }}"></script>

    {{-- * Datatable --}}
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    {{-- * Flatpickr --}}
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/l10n/id.js') }}"></script>
    <script src="{{ asset('assets/helper/flatpickr.js') }}"></script>

    {{-- * Preview Image --}}
    <script src="{{ asset('assets/helper/preview-image.js') }}"></script>

    {{-- * Regex --}}
    <script src="{{ asset('assets/helper/regex.js') }}"></script>

    {{-- * Select2 --}}
    <script src="{{ asset('assets/vendor/libs/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/helper/select2-translation.js') }}"></script>
    <script src="{{ asset('assets/helper/select2.js') }}"></script>

    {{-- * Custom Js --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/js/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plyr.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('custom_js')
</body>

</html>
