var ControllerJS = function () {

    // var updateOutput = function (e) {
    //     var list = e.length ? e : $(e.target),
    //         output = list.data('output');
    //     if (window.JSON) {
    //         output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
    //     } else {
    //         output.val('JSON browser support required for this demo.');
    //     }
    // };

    var handleDatePickers = function () {

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                orientation: "left",
                autoclose: true,
                format: 'dd/mm/yyyy',
                language: 'vi'
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        /* Workaround to restrict daterange past date select: http://stackoverflow.com/questions/11933173/how-to-restrict-the-selectable-date-ranges-in-bootstrap-datepicker */
    }

    var handleNestable = function () {
        $('#nestable_categories').nestable();
    }

    return {
        //main function to initiate the module
        init: function () {
            handleNestable();
            handleDatePickers();
        }

    };

}();