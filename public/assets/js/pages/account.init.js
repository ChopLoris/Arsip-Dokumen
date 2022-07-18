$(document).ready(function() {
    "use strict";
    var dataId;
    var dataTable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 5,
        dom: 'Bfrtip',
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: 'account-list/list',
        columns: [
            {data: 'id',
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'is_admin',
            render: function(data, type, row, meta) {
                return data == 1 ? 'Admin' : 'User'
            }},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        $('#level_edit').find('option:selected').removeAttr("selected");
        dataId = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "account-list/data/"+dataId,
            dataType: 'json',
            success: function(data){
                $('#name_edit').val(data.name)
                $('#username_edit').val(data.username)
                $('#email_edit').val(data.email)
                $('#level_edit option[value='+data.is_admin+']').attr('selected','selected');
            }
        });
    });

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        dataId = $(this).attr('data-id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Ingin menghapus akun ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "account-list/delete/"+dataId,
                    dataType: 'json',
                    success: function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                          })
                    dataTable.ajax.reload();
                    },
                    error: function(e){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: "Terjadi Kesalahan saat menghapus data",
                            html: response.message,
                            showConfirmButton: false,
                            timer: 3000
                          })
                    }
                });
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Batal",
                    text: "Anda telah membatalkan penghapusan akun, data tetap aman",
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
          })
    });

    $(document).on('click', '#btnSaveAccount', function(e) {
        e.preventDefault();
        var data = {
            'name_edit': $('#name_edit').val(),
            'username_edit': $('#username_edit').val(),
            'email_edit': $('#email_edit').val(),
            'level_edit': parseInt($('#level_edit').val()),
            'pass_edit': $('#pass_edit').val(),
        };

        $.ajax({
            type: "POST",
            url: "account-list/update/"+dataId,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                $('#edit-account').modal('toggle');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
            dataTable.ajax.reload();
            },
            error: function (e) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Terjadi Kesalahan saat update data",
                    html: response.message,
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        });
    })

    $(document).on('click', '#btnAddAccount', function(e) {
        e.preventDefault();
        var data = {
            'name': $('#name').val(),
            'username': $('#username').val(),
            'email': $('#email').val(),
            'level': parseInt($('#level').val()),
            'password': $('#password').val(),
        };

        $.ajax({
            type: "POST",
            url: "account-list/add",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (response) {
                $('#add-account').modal('toggle');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
            dataTable.ajax.reload();
            },
            error: function (e) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Terjadi Kesalahan",
                    html: 'Periksa kembali data yang di input, atau tanyakan kepada admin',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        });
    })
});
