$(document).ready(function() {

    function dataTableSpajSubmittedDaily() {
        // Setup - add a text input to each footer cell
        $('#example thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#example').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailSpajSubmittedDaily",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTableSpajSubmittedWeekly() {
        // Setup - add a text input to each footer cell
        $('#exampleWeekly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });

        var table = $('#exampleWeekly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailSpajSubmittedWeekly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTableSpajSubmittedMonthly() {
        // Setup - add a text input to each footer cell
        $('#exampleMonthly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#exampleMonthly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailSpajSubmittedMonthly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTableSpajSubmittedYearly() {
        // Setup - add a text input to each footer cell
        $('#exampleYearly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        var table = $('#exampleYearly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailSpajSubmittedYearly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTablePoliceApprovedDaily() {
        // Setup - add a text input to each footer cell
        $('#examplePoliceApprovedDaily thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#examplePoliceApprovedDaily').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPoliceApprovedDaily",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTablePoliceApprovedWeekly() {
        // Setup - add a text input to each footer cell
        $('#examplePoliceApprovedWeekly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });

        var table = $('#examplePoliceApprovedWeekly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPoliceApprovedWeekly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTablePoliceApprovedMonthly() {
        // Setup - add a text input to each footer cell
        $('#examplePoliceApprovedMonthly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#examplePoliceApprovedMonthly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPoliceApprovedMonthly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }

    function dataTablePoliceApprovedYearly() {
        // Setup - add a text input to each footer cell
        $('#examplePoliceApprovedYearly thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#examplePoliceApprovedYearly').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPoliceApprovedYearly",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'no_proposal',
                    name: 'no_proposal'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'nominal_premi',
                    name: 'nominal_premi'
                },
                {
                    data: 'nama_tele',
                    name: 'nama_tele'
                },
                {
                    data: 'tanggal_submit',
                    name: 'tanggal_submit'
                },

            ]
        });
    }


    // Spaj Submitted Chart Start
    function dataTablePremiumSubmitted() {
        // Setup - add a text input to each footer cell
        $('#examplePremiumSubmitted thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#examplePremiumSubmitted').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPremiumSubmitted",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'year_name',
                    name: 'year_name'
                },
                {
                    data: 'month_name',
                    name: 'month_name'
                },
                {
                    data: 'sum_nominal',
                    name: 'sum_nominal'
                },
            ]
        });
    }

    function dataTableSpajSubmittedChart() {
        // Setup - add a text input to each footer cell
        $('#exampleSpajSubmittedChart thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#exampleSpajSubmittedChart').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailSpajSubmittedChart",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'year_name',
                    name: 'year_name'
                },
                {
                    data: 'month_name',
                    name: 'month_name'
                },
                {
                    data: 'count',
                    name: 'count'
                },
            ]
        });
    }
    // Spaj Submitted Chart End


    // Police Approved Chart Start
    function dataTablePoliceApprovedChart() {
        // Setup - add a text input to each footer cell
        $('#examplePoliceApprovedChart thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#examplePoliceApprovedChart').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailPoliceApprovedChart",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'year_name',
                    name: 'year_name'
                },
                {
                    data: 'month_name',
                    name: 'month_name'
                },
                {
                    data: 'count',
                    name: 'count'
                },
            ]
        });
    }

    function dataTableTotalPremiumChart() {
        // Setup - add a text input to each footer cell
        $('#exampleTotalPremiumChart thead th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title +
                '" />');
        });
        var table = $('#exampleTotalPremiumChart').dataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            autoWidth: true,
            processing: true,
            serverSide: true,
            destroy: true,
            responsive: true,
            language: {
                processing: '<span style="color:#fff;">Mohon Tunggu...</span><i class="fe fe-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                sLengthMenu: "Tampilkan _MENU_ Baris",
                sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "Cari:",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            stateSave: true,
            order: [],
            ajax: "/management/spaj/detailTotalPremiumChart",
            deferRender: true,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'year_name',
                    name: 'year_name'
                },
                {
                    data: 'month_name',
                    name: 'month_name'
                },
                {
                    data: 'sum_nominal',
                    name: 'sum_nominal'
                },
            ]
        });
    }
    // End Approved Chart


    $(this).on('click', '#detailSpajSubmittedDaily', function(e) {
        dataTableSpajSubmittedDaily();
        $("#example_filter").hide();
    });

    $(this).on('click', '#detailSpajSubmittedWeekly', function(e) {
        dataTableSpajSubmittedWeekly();
        $("#exampleWeekly_filter").hide();
    });

    $(this).on('click', '#detailSpajSubmittedMonthly', function(e) {
        dataTableSpajSubmittedMonthly();
        $("#exampleMonthly_filter").hide();
    });

    $(this).on('click', '#detailSpajSubmittedYearly', function(e) {
        dataTableSpajSubmittedYearly();
        $("#exampleYearly_filter").hide();
    });

    // Submitted Chart
    $(this).on('click', '#detailPremiumSubmitted', function(e) {
        dataTablePremiumSubmitted();
        $("#examplePremiumSubmitted_filter").hide();
    });

    $(this).on('click', '#detailSpajSubmittedChart', function(e) {
        dataTableSpajSubmittedChart();
        $("#exampleSpajSubmittedChart_filter").hide();
    });

    // Police Approved
    $(this).on('click', '#detailPoliceApprovedDaily', function(e) {
        dataTablePoliceApprovedDaily();
        $("#examplePoliceApprovedDaily_filter").hide();
    });

    $(this).on('click', '#detailPoliceApprovedWeekly', function(e) {
        dataTablePoliceApprovedWeekly();
        $("#examplePoliceApprovedWeekly_filter").hide();
    });

    $(this).on('click', '#detailPoliceApprovedMonthly', function(e) {
        dataTablePoliceApprovedMonthly();
        $("#examplePoliceApprovedYMonthly_filter").hide();
    });

    $(this).on('click', '#detailPoliceApprovedYearly', function(e) {
        dataTablePoliceApprovedYearly();
        $("#examplePoliceApprovedYearly_filter").hide();
    });

    $(this).on('click', '#detailPoliceApprovedChart', function(e) {
        dataTablePoliceApprovedChart();
        $("#examplePoliceApprovedChart_filter").hide();
    });

    $(this).on('click', '#detailTotalPremiumChart', function(e) {
        dataTableTotalPremiumChart();
        $("#exampleTotalPremiumChart_filter").hide();
    });

});