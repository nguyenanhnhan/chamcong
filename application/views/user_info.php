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
                    <a href="<?php echo base_url('work_time/index') ?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#"> Tạo tài khoản </a>
                    <!-- <i class="fa fa-circle"></i> -->
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Tạo tài khoản mới
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light ">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase"></span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Thông tin cá nhân </a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                </div>
                <?php if (isset($message) && !empty($message)) { ?>
                <div class="alert alert-info">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo $message ?> </span>
                </div> 
                <?php } ?>
                <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="tab_1_1">
                        <form id="form_user_info" role="form" action="<?php echo base_url('user/insert') ?>" method="POST">
                            <div class="form-group">
                                <label class="control-label"> Họ và tên đệm </label>
                                <input type="text" placeholder=" Nguyễn Quỳnh " class="form-control" name="first_name" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Tên </label>
                                <input type="text" placeholder=" Trâm " class="form-control" name="last_name" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Mật khẩu </label>
                                <input type="password" name="new_password" id="new_password" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label"> Xác nhận lại mật khẩu </label>
                                <input type="password" name="confirm_password" class="form-control" /> </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" id="user_email" name="user_email" placeholder="nguyenquynhtram@email.com" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Địa chỉ IP khả dụng </label>
                                <input type="text" placeholder=" xxx.xxx.xxx.xxx " class="form-control" name="ip_access" id="ip_access" /> 
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Địa chỉ IP khả dụng phụ </label>
                                <input type="text" placeholder=" xxx.xxx.xxx.xxx " class="form-control" name="ip_access_2" id="ip_access_2" /> 
                            </div>
                            <div class="margiv-top-10">
                                <button type="submit" value="save_n_next" name="submit" class="btn green"> Lưu và tiếp tục tạo mới </button>
                                <button type="submit" value="save_n_close" name="submit" class="btn blue"> Lưu và thoát </button>
                            </div>
                        </form>
                    </div>
                    <!-- END PERSONAL INFO TAB -->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php echo load_view('templates/foot_part') ?>

<script src="<?php echo asset_url() ?>pages/scripts/work_time/user_info.js"></script>

<script>
$(document).ready(function() {
    ControllerJS.init();
});
</script>