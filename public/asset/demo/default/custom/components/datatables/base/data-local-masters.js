//== Class definition

var DatatableDataLocalDemo = function () {
	//== Private functions

	// demo initializer
	var demo = function () {

		
		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: team_master,
				pageSize: 10
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				// height: 450, // datatable's body's fixed height
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#generalSearch')
			},

			// inline and bactch editing(cooming soon)
			// editable: false,

			// columns definition
			columns: [{
				field: "id",
				title: "No",
				width: 0,
			},{
				field: "name",
				title: "Username",
				width: 120,
			}, {
				field: "email",
				title: "Email",
				width: 250,
			}, {
				field: "firstname",
				title: "First Name",
				responsive: {visible: 'lg'}
			}, {
				field: "lastname",
				title: "Last Name",
				width: {visible: 'lg'}
			}, {
				field: "active",
				title: "Status",
				width: 70,
				// callback function support for column rendering
				template: function (row) {
					var status = {
						1: {'title': 'Active', 'class': ' m-badge--success'},
						0: {'title': 'Deactive', 'class': ' m-badge--danger'},
					};
					return '<span class="m-badge ' + status[row.active].class + ' m-badge--wide">' + status[row.active].title + '</span>';
				}
			}, {
				field: "Actions",
				width: 110,
				title: "Actions",
				sortable: false,
				overflow: 'visible',
				template: function (row) {
					var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';

					return '\
						<div class="dropdown '+ dropup +'">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item dropdown-edit-department" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item dropdown-status-department" href="#"><i class="la la-leaf"></i> Update Status</a>\
						  	</div>\
						</div>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-department" title="Edit details">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete-department" data-toggle="modal" data-target="#m_modal_1" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';
				}
			}]
		});

		var query = datatable.getDataSourceQuery();

		$('#m_form_status').on('change', function () {
			datatable.search($(this).val(), 'Status');
		}).val(typeof query.Status !== 'undefined' ? query.Status : '');

		$('#m_form_type').on('change', function () {
			datatable.search($(this).val(), 'Type');
		}).val(typeof query.Type !== 'undefined' ? query.Type : '');

		$('#m_form_status, #m_form_type').selectpicker();

	};

	return {
		//== Public functions
		init: function () {
			// init dmeo
			demo();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableDataLocalDemo.init();
});