var ControllerJS = function () {

	var initTables = function () {

	    var table = $('#user_list');

	    // begin first table
	    var oTable = table.dataTable({

	        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
	        "autoWidth": false,
	        "lengthMenu": [
	            [5, 15, 20, -1],
	            [5, 15, 20, "All"] // change per page values here
	        ],
	        // set the initial value
	        "pageLength": 5,            
	        "pagingType": "bootstrap_full_number",
	        "columnDefs": [{  // set default column settings
	            'orderable': false,
	            'targets': [0]
	        }, {
	            "searchable": false,
	            "targets": [0]
	        }],
	        "order": [
	            [1, "asc"]
	        ], // set first column as a default sort by asc

	        "columns": [{
	            // action column
	            "orderable":false,
	            "className": "cell-align-center",
	            "width": 28
	        },{
	            // id column
	            "width": 30
	        },{
	            // Full Name
	            "width": 160
	        },{
	            // email column
	        },{
	            // IP Access
	            "width": 160
	        }],

	    });

	}

    return {
        //main function to initiate the module
        init: function () {
        	if (!jQuery().dataTable) {
        	    return;
        	}

            initTables();
        }

    };

}();