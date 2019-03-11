//== Class definition
var DatatableChildDataLocalDemo = function () {

	//== Private functions

	var subTableInit = function (e) {
		$('<div/>').attr('id', 'child_data_local_' + e.data.id).appendTo(e.detailCell)
			.mDatatable({
				data: {
					type: 'local',
					source: e.data.Order,
					pageSize: 10,
					saveState: {
						cookie: true,
						webstorage: true
					}
				},

				// layout definition
				layout: {
					theme: 'default',
					scroll: true,
					height: 300,
					footer: false,

					// enable/disable datatable spinner.
					spinner: {
						type: 1,
						theme: 'default'
					}
				},

				sortable: true,

				// columns definition
				columns: [{
					field: "id",
					title: "id",
					width: 0
				}, {
					field: "name",
					title: "Username",
				}, {
					field: "firstname",
					title: "First Name",
				}, {
					field: "lastname",
					title: "Last Name"
				}, {
					field: "email",
					title: "Email"
				},{
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
				}]
			});
	}

	// demo initializer
	var mainTableInit = function () {



		//var dataJSONArray = JSON.parse('[{"RecordID":1,"FirstName":"Mariellen","LastName":"Goretti","Company":"Chatterpoint","Email":"mgoretti0@omniture.com","Orders":[{"OrderID":"1","ShipCountry":"CN","ShipAddress":"7770 Melody Plaza","ShipName":"Denesik Inc"},{"OrderID":"2","ShipCountry":"CN","ShipAddress":"161 Nova Pass","ShipName":"Fritsch, Rau and Schamberger"},{"OrderID":"3","ShipCountry":"MX","ShipAddress":"00 Springview Alley","ShipName":"Legros-Toy"},{"OrderID":"4","ShipCountry":"BD","ShipAddress":"06 Park Meadow Parkway","ShipName":"Botsford, Kovacek and Hilll"},{"OrderID":"5","ShipCountry":"PH","ShipAddress":"8 Service Terrace","ShipName":"Keebler and Sons"}]}]');

		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: department,
				pageSize: 10, // display 20 records per page
				saveState: {
					cookie: true,
					webstorage: true
				}
			},

			// layout definition
			layout: {
				theme: 'default',
				scroll: false,
				height: null,
				footer: false
			},

			sortable: true,

			filterable: false,

			pagination: true,

			detail: {
				title: 'Load sub table',
				content: subTableInit
			},

			search: {
				input: $('#generalSearch')
			},

			// columns definition
			columns: [{
				field: "id",
				title: "",
				sortable: false,
				width: 20,
				textAlign: 'center' // left|right|center,
			}, {
				field: "companylogo",
				title: "Company Logo",
				template: function(data) {
					output = '<div class="m-card-user m-card-user--sm" style="margin:auto;">\
								<div class="m-card-user__pic">\
									<img src="../../uploads/images/' + data.companylogo + '" class="m--img-rounded m--marginless" alt="photo" style="width:40px; height:40px;">\
								</div>\
								</div>';
					return output;
				 }
			}, {
				field: "companyname",
				title: "Company Name"
			}, {
				field: "country",
				title: "Country"
			}, {
				field: "master_name",
				title: "Master Username",
				width: 200
			}, {
				field: "master_email",
				title: "Email"
			}, {
				field: "active",
				title: "Status",
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

	};

	return {
		//== Public functions
		init: function () {
			// init dmeo
			mainTableInit();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableChildDataLocalDemo.init();
});