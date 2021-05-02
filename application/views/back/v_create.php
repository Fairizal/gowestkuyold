<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
            <div class="flex-sm-fill">
                <h1 class="h3 font-w700 mb-2">
                    <?php echo $title ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Basic -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title"><?php echo $title ?></h3>
        </div>
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="form-group row col-lg-6">
                            <select class="js-select2 form-control" id="search" name="search" style="width: 50%;" data-placeholder="Cari Sewa">
                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                <?php
                                    foreach ($dataSewa as $sewa) {
                                ?>
                                    <option value="<?= $sewa->id ?>"><?= $sewa->trxno ?></option>

                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <input type="hidden" name="sewa_id" id="sewa_id" value="">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">No. Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="trxno" name="trxno" placeholder="Isi No. Transaksi atau biarkan kosong">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-flatpickr-datetime-24" class="col-sm-4 col-form-label">Tanggal Kembali</label>
                            <div class="col-sm-8">
                                <input type="text" class="js-flatpickr form-control" id="tgl_kembali" name="tgl_kembali" data-enable-time="true" data-time_24hr="true" placeholder="Pilih tanggal" value="<?php echo date("Y-m-d H:i", strtotime("now") + 5*60*60)?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Lama Telat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="backdays" name="backdays" placeholder="Isi lama telat">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Pelanggan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pelanggan" name="pelanggan" placeholder="Isi nama pelanggan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">No. HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Isi No. HP Karyawan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat Karyawan">
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter" id="detail">
                                <thead>
                                    <tr>
                                        <th>Sepeda</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="nullDataTable">
                                        <td class="font-w400" colspan="2">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row push">
                    <div class="col-lg-4" style="margin-left: 615px">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Total Denda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="total_denda" name="total_denda" placeholder="Total denda" value="0" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="<?= base_url('back')?>" class="btn btn-alt-light" id="back">Kembali</a>
                    <button onclick="$.fn.save()" class="btn btn-primary" id="save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Basic -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    var dataSepeda = <?= json_encode($dataSepeda) ?>;
    var dataSewa = <?= json_encode($dataSewa) ?>;
    var dataDetail = [];
    // $(document).ready(function() {
    //     var today = new Date();
    //     var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    //     var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    //     var dateTime = date+' '+time;
    //     $('#tgl_kembali').val('2021-04-16 ');
    // })

    $('#search').change(function(){
        $('#total_denda').val('0');
        var id = $(this).select2('val');
        if (id != "") {
            var sewa = filter(dataSewa, id);
            $('#sewa_id').val(sewa.id);
            var dateNow = new Date('<?php echo date("Y-m-d")?>');
            var sewaDate = new Date(moment(sewa.tgl_sewa, "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD"));
            var days = (dateNow-sewaDate) / (1000 * 60 * 60 * 24);
            var telat = days > 0 ? days - parseInt(sewa.duedays) : 0;
            $('#backdays').val(telat);
            var checkNullColumn = $('#detail > tbody:last').find('tr');
            if (checkNullColumn) {
                $('#nullDataTable').remove();
            }
            var idx = 0; 
            var rowCount = $('#detail tbody tr').length;
            $.ajax({
                method: "POST",
                url: "<?= base_url('back/getSewad/') ?>" + id,
                dataType: 'json',
                success: function(datas) {
                    if(datas) {
                        datas.map(function(data) {
                            var denda = telat*50000;
                            var dataTemp = {
                                'idx': data.idx,
                                'sepeda_id': data.sepeda_id,
                                'subdenda': denda,
                            }
                            dataDetail.push(dataTemp);
                            var sepedaId = '<input type="hidden" id="sepeda_id" name="backd['+data.idx+'][sepeda_id]" value="'+data.sepeda_id+'">';
                            var subdenda = '<input type="hidden" id="subdenda" name="backd['+data.idx+'][subdenda]" value="">';
                            var namaColumn = '<td class="font-w600 font-size-sm" id="td_nama_'+data.idx+'">'+data.namaSepeda+'</td>';
                            var dendaColumn = '<td class="font-w600 font-size-sm" id="td_denda'+data.idx+'">'+ denda +'</td>';
                            var rowTable = '<tr id="tr_'+data.idx+'">'+ sepedaId + subdenda + namaColumn + dendaColumn +'</tr>';
                            $('#detail > tbody:last').append(rowTable);
                            var total_denda = $('#total_denda').val();
                            $('#total_denda').val(parseInt(total_denda)+parseInt(denda));
                        })
                    } 
                    else {
                        $('#toastTitle').text('Error');
                        $('#toastText').text('Data tidak ditemukan');
                        jQuery('#toast-example-1').toast('show');
                    }
                }
            });
        }
    });

    // $.fn.deleteColumn = function(id) {
    //     var total = $('#total').val();
    //     var harga = $('#td_harga_'+id).text();
    //     $('#total').val(parseInt(total)-parseInt(harga));
    //     $('#tr_'+id).remove();
    //     var rowCount = $('#detail tbody tr').length;
    //     if(rowCount < 1) {
    //         var nullData = '<tr id="nullDataTable"><td class="font-w400" colspan="3">Tidak ada data</td></tr>'
    //         $('#detail > tbody:last').append(nullData);
    //     }
    //     for (var i = 0 ; i < dataDetail.length; i++) {
    //         if(dataDetail[i].idx == id) {
    //             dataDetail.splice(i, 1);
    //         }
    //     }
    //     // console.log(dataDetail);
    // }

    $.fn.save = function() {
        var sewa_id = $('#sewa_id').val();
        var trxno = $('#trxno').val();
        var tgl_kembali = $('#tgl_kembali').val();
        var backdays = $('#backdays').val();
        var total_denda = $('#total_denda').val();
        // console.log([nama, type, merk]);
        $.ajax({
            method: "POST",
            url: "<?= base_url('back/create') ?>",
            data: { 
                sewa_id: sewa_id, 
                trxno: trxno, 
                tgl_kembali: tgl_kembali,
                backdays: backdays, 
                total_denda: total_denda, 
                detail : dataDetail,
            },
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                    window.location.href = "<?= base_url('back/view/') ?>"+data.id;
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }

    // function filterDetail(data, id, key) {
    //     for (var i = 0;  i < data.length; i++) {
    //         if(data[i].key == id){
    //             return data[i];
    //         }
    //     }
    // }
</script>