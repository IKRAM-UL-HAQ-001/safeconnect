<!DOCTYPE html>
<html lang="en">

@include("layout.header")

<body>
    <div id="main-wrapper">
            
        @include("layout.sideNav")
        @include("layout.topNav")    
        
        <div class="content-body">
            @yield("content")
        </div>
        
        @include("layout.footer")
    </div>
</body>

<!-- Scripts -->
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/quixnav-init.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

</html>
