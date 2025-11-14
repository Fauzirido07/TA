<script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
 <script src="{{ asset('assets/js/adminlte.js') }}"></script>
<script>
  const toastSuccess = document.getElementById('toastSuccess');
          const toastBootstrapSuccess = bootstrap.Toast.getOrCreateInstance(toastSuccess);
  const toastDanger = document.getElementById('toastDanger');
          const toastBootstrapDanger = bootstrap.Toast.getOrCreateInstance(toastDanger);
          @if(session('success'))
          toastBootstrapSuccess.show();
          @endif
          @if(session('error'))
          toastBootstrapDanger.show();
          @endif
</script>