


        </div>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/dist/js/adminlte.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/dist/js/demo.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/raphael/raphael.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/jquery-mapael/maps/world_countries.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
        <script type="text/javascript" src="<?php echo latestFile('assets/admin/dist/js/pages/dashboard2.js') ?>"></script>
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
    </body>
</html>
