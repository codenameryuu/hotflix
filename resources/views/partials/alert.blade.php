@if (session()->has('info'))
    <script>
        notifyInfo("{{ session('info') }}");
    </script>
@endif

@if (session()->has('success'))
    <script>
        notifySuccess("{{ session('success') }}");
    </script>
@endif

@if (session()->has('danger'))
    <script>
        notifyDanger("{{ session('danger') }}");
    </script>
@endif
