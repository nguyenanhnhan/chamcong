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
                <li>
                    <a href="#"> Tài khoản hệ thống </a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Danh sách tài khoản 
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover tbl_custom" id="user_list">
                <thead>
                <tr>
                    <th> </th>
                    <th> # </th>
                    <th> Họ và tên </th>                           
                    <th> Email </th>
                    <th> IP Access </th>                                
                </tr>
                </thead>
                <tbody>
                    <?php if (isset($users) && !empty($users)){ 
                            foreach ($users as $key => $value) {
                            if ($value->id != $current_user->id){
                                $html_body = '<tr><td>';
                                $html_body .= sprintf('<a class="btn btn-icon-only default" href="%s"><i class="fa fa-pencil"></i></a>&nbsp;',base_url('user/edit_user/'.$value->id));
                                $html_body .= '</td>';
                                $html_body .= sprintf('<td> %s </td><td> %s </td><td> %s </td><td> %s </td></tr>',$value->id, $value->first_name.' '.$value->last_name, $value->email, $value->ip_access);
                                echo $html_body;
                            }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php echo load_view('templates/foot_part') ?>

<script src="<?php echo asset_url() ?>pages/scripts/work_time/user_list.js"></script>

<script>
$(document).ready(function() {
    ControllerJS.init();
});
</script>

