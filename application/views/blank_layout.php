<?php echo load_view('templates/head_part') ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Blank Page</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Page Layouts</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Blank Page Layout
            <small>blank page layout</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="note note-info">
            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php echo load_view('templates/foot_part') ?>

<script src="<?php echo asset_url() ?>pages/scripts/work_time/blank_layout.js"></script>

<script>
$(document).ready(function() {
    ControllerJS.init();
});
</script>

