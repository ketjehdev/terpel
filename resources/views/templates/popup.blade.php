<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('gagal'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ups..',
        text: "{{ session('gagal') }}",
        // timer: 2000,
        // timerProgressBar: true,
    });
</script>    
@endif