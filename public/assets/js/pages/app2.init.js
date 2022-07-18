$(document).ready(function() {
    "use strict";
    var dataId;

    const urlData = [
        "surat/list",
        "RAB/list",
        "BoM/list",
        "SPK/list",
        "Documents/list"
    ]

    var cat_id = parseInt($('#category_id').val());
    var urlCatch;
    switch(cat_id)
    {
        case 1:
            urlCatch = urlData[0];
            break;
        case 2:
            urlCatch = urlData[1];
            break;
        case 3:
            urlCatch = urlData[2];
            break;
        case 4:
            urlCatch = urlData[3];
            break;
        case 5:
            urlCatch = urlData[4];
            break;
    }

    var dataTable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        pageLength: 5,
        dom: 'Bfrtip',
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: urlCatch,
        columns: [
            {data: 'nomor_dokumen', name: 'nomor_dokumen'},
            {data: 'pekerjaan', name: 'pekerjaan'},
            {data: 'tanggal_pelaksanaan', name: 'tanggal_pelaksanaan'},
            {data: 'akhir_pelaksanaan', name: 'akhir_pelaksanaan'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

    $(document).on("click", ".btn-view", function () {
        dataId = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "surat/data/"+dataId,
            dataType: 'json',
            success: function(data){
              var data = data.data;
              data.forEach(item => {
                  $('#no_dokumen').val(item.nomor_dokumen);
                  $('#jenis_dokumen').val(item.jenis_doc);
                  $('#pekerjaan').val(item.pekerjaan);
                  if($('#no_surat').length)
                  {
                      $('#no_surat').val(item.nomor_surat);
                  }
                  $('#tgl_pekerjaan').val(item.tanggal_pelaksanaan);
                  $('#tgl_selesai').val(item.akhir_pelaksanaan);
                  $('#description').val(item.description);
                  $('#show-files').attr('src', 'dokumentasi/'+item.jenis_doc+'/'+item.file_name)
              });
            }
        });
    });

    $(document).on("click", ".btn-delete", function () {
        dataId = $(this).attr('data-id');
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda ingin menghapus dokumen ini!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak, Batalkan!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1
        }).then(function(t) {
            if(t.value)
            {
                $.ajax({
                    type: "GET",
                    url: "surat/delete/"+dataId,
                    dataType: 'json',
                    success: function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.data,
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }
                });
                dataTable.ajax.reload();
            }
            else
            {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Data tetap aman, anda telah membatalkan penghapusan.',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }
        })
    });
});
