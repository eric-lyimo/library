@if(session('error'))
    <script>
        toastr(session('error'));
    </script>
@endif