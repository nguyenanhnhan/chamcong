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
                    <a href="#">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?php echo $current_user->first_name.' '.$current_user->last_name ?>
            <small><?php echo $current_user->email ?></small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- <div class="note note-info">
            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
        </div> -->
        <div class="col-md-6">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-sharp">
                        <i class="icon-share font-green-sharp"></i>
                        <span class="caption-subject uppercase bold"> Thời gian ra vào trong ngày </span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php if ($current_user->ip_access != $localIP) { ?>
                    <div class="alert alert-danger">
                         <!-- <?php echo 'Hệ thống không chấp nhận truy xuất từ IP: '.$localIP; ?>  -->
                         <?php echo 'Chấm công không thể thực hiện ở ngoài trường.' ?>
                    </div>
                    <?php } ?>
                    <form action="<?php echo base_url('work_time/check') ?>" method="POST">
                        <?php if ($current_user->ip_access == $localIP) { ?>
                        <div class="alert alert-info">
                            Ngày <strong><?php echo date("d/m/Y") ?></strong>
                            <?php if ($check_in == FALSE) {?>
                            <button type="submit" name="check_time" value="check_in" class="btn btn-primary"> <i class="fa fa-calendar-check-o"></i> Thời gian vào </button>
                            <?php } else { ?>
                            <button type="submit" name="check_time" value="check_out" class="btn btn-primary"> <i class="fa fa-calendar-times-o"></i> Thời gian ra </button>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </form>
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <!-- <th> Ngày làm việc </th> -->
                                    <th> Thời gian vào </th>
                                    <th> Thời gian ra </th>
                                    <!-- <th> Ghi chú </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($working_time) && !empty($working_time)) {
                                    foreach ($working_time as $key => $value) {
                                        echo '<tr>';
                                        echo '<td>'.mdate('%H:%i',$value->check_in).'</td>';
                                        if ($value->check_out == NULL)
                                        {
                                            echo '<td></td>';
                                        }
                                        else
                                        {
                                            echo '<td>'.mdate('%H:%i',$value->check_out).'</td>';    
                                        }
                                        echo '</tr>';
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-blue">
                        <i class="fa fa-calendar"></i>
                        <span class="caption-subject uppercase bold"> Các ngày trước </span>
                    </div>
                    <div class="inputs">
                        <div class="portlet-input input-inline input-medium">
                            <div class="input-group">
                                <input type="text" class="form-control input-left">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-right">Xem</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
                    </div> -->
                </div>
                <div class="portlet-body"></div>
            </div>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php echo load_view('templates/foot_part') ?>

<script src="<?php echo asset_url() ?>pages/scripts/work_time/dashboard.js"></script>

<script>
$(document).ready(function() {
    ControllerJS.init();
});
</script>

