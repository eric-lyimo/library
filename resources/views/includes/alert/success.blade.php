@if(session('success'))
    <script>
        toastr(session('success'));
    </script>
@endif