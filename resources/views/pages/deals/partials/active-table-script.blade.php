<script>
"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {

        var el = $('#kt_datatable');

        var datatable = el.KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: ,
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: el.find('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: 'Deal No',
                sortable: 'asc',
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'portfolio_id',
                title: 'Portfolio',
                template: function(row) {
                    return row.portfolio.name;
                },
            }, {
                field: 'client_name',
                title: 'Client Name',
                template: function(row) {
                    return row.client.name ;
                },
            }, {
                field: 'cliet_no',
                title: 'Client No',
                template: function(row) {
                    return row.client.id ;
                },
            },
            {
                field: 'plot_no',
                title: 'Plot No',

            }, {
                field: 'status',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    return '<span class="label font-weight-bold label-lg label-light-success label-inline"> Active </span>';
                },
            }, {
                field: 'Type',
                title: 'Type',
                autoHide: false,
                // callback function support for column rendering
                template: function(row) {
                    if(row.type != null) {
                        return '<span class="label label-primary label-dot mr-2"></span><span class="font-weight-bold text-primary">' +
                           row.type.charAt(0).toUpperCase() + '</span>';
                    }
                    return null;
                },
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function() {
                    return '\
                        <span style="overflow: visible; position: relative">\
                            <a href="{{ route("deal.renew", 'row.id') }}"\
                                class="btn btn-sm btn-clean btn-icon" title="Renew">\
                                <i class="flaticon-refresh text-success"></i>\
                            </a>\
                            <a href="{{ route("clients.edit", 'row.id') }}" class="btn btn-sm btn-clean btn-icon"\
                                title="View details">\
                                <i class="fas fa-edit text-primary"></i>\
                            </a>\
                            <a href="{{ route("deal.close.form", 'row.id') }}" class="btn btn-sm btn-clean btn-icon"\
                                title="Close Deal">\
                                <i class="fas fa-times text-warning"></i>\
                            </a>\
                        </span>\
                    ';
                },
            }],

        });

		$('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}


</script>
