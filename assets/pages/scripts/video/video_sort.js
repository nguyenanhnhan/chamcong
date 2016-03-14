var ControllerJS = function () {
    
    var handleBootstrapSelect = function() {
        $('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });
    }

    var handleNestable = function () {
        $('#nestable_video_priority').nestable();
    }

    return {
        //main function to initiate the module
        init: function () {
            handleBootstrapSelect();
            handleNestable();
        }

    };

}();