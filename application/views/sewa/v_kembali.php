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
            <h3 class="block-title" style="display: inline-block;"><?php echo $title ?></h3>
            <!-- <a class="btn btn-danger" id="delete" onclick="$.fn.delete()">Hapus</a> -->
        </div>
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-6 col-xl-6">
                        <input type="hidden" name="id" id="id" value="<?= $dataSewa[0]->id ?>">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">No. Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="trxno" name="trxno" placeholder="Isi No. Transaksi atau biarkan kosong" disabled value="<?= $dataSewa[0]->trxno ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-flatpickr-datetime-24" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="js-flatpickr form-control" id="tgl_sewa" name="tgl_sewa" data-enable-time="true" data-time_24hr="true" placeholder="Pilih tanggal" disabled style="cursor:auto" value="<?= $dataSewa[0]->tgl_sewa ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Lama Sewa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="duedays" name="duedays" placeholder="Isi lama sewa" disabled value="<?= $dataSewa[0]->duedays ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Pelanggan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pelanggan" name="pelanggan" placeholder="Isi nama pelanggan" disabled value="<?= $dataSewa[0]->pelanggan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">No. HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Isi No. HP Karyawan" disabled value="<?= $dataSewa[0]->nohp ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat Karyawan" disabled value="<?= $dataSewa[0]->alamat ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row push">
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Sepeda</label>
                            <div class="col-sm-8">
                                <select class="js-select2 form-control" id="sepeda_id" name="sepeda_id" data-placeholder="Cari Sepeda" disabled>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <?php
                                        foreach ($dataSepeda as $sepeda) {
                                    ?>
                                        <option value="<?= $sepeda->id ?>" qty="<?= $sepeda->qty ?>"><?= $sepeda->nama . ' / ' . $sepeda->qty ?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-flatpickr-datetime-24" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-8">
                                <input type="text" class="js-flatpickr form-control" id="tgl_kembali" name="tgl_kembali" data-enable-time="true" data-time_24hr="true" placeholder="Pilih tanggal" disabled style="cursor:auto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Telat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="backdays" name="backdays" placeholder="Telat Pengembalian" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Biaya Sewa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="total" name="total" placeholder="Total" value="<?= $dataSewa[0]->total ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Denda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="denda" name="denda" placeholder="Denda" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="total_biaya" name="total_biaya" placeholder="Total Biaya" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="<?= base_url('sewa')?>" class="btn btn-alt-light" id="back">Kembali</a>
                    <button onclick="$.fn.save()" class="btn btn-primary" id="save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Basic -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    var sewa = <?= json_encode($dataSewa[0]) ?>;
    console.log(sewa);
    // var dateSewa;
    $(document).ready(function() {
        if (sewa.isback == "0") {
            $('#sepeda_id').val(sewa.sepeda_id);
            $('#sepeda_id').trigger('change');
            var dateSewa = moment('<?php echo date("Y-m-d H:i:s")?>', "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD HH:mm");
            $('#tgl_kembali').val(dateSewa);
            var dateNow = new Date(moment('<?php echo date("Y-m-d H:i:s")?>', "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD"));
            var sewaDate = new Date(moment($('#tgl_sewa').val(), "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD"));
            var days = (dateNow-sewaDate) / (1000 * 60 * 60 * 24);
            var telat = days > 0 ? days - parseInt(sewa.duedays) : 0;
            $('#backdays').val(telat);
            $('#denda').val(telat*50000);
            $('#total_biaya').val(parseInt($('#denda').val())+parseInt($('#total').val()));
        } else {
            $('#save').prop('disabled', true);
            $('#save').text('Sudah Dikembalikan');
            $('#sepeda_id').val(sewa.sepeda_id);
            $('#sepeda_id').trigger('change');
            var dateSewa = moment(sewa.tgl_kembali, "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD HH:mm");
            $('#tgl_kembali').val(dateSewa);
            var dateNow = new Date(moment('<?php echo date("Y-m-d H:i:s")?>', "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD"));
            var sewaDate = new Date(moment($('#tgl_sewa').val(), "YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD"));
            var days = (dateNow-sewaDate) / (1000 * 60 * 60 * 24);
            var telat = days > 0 ? days - parseInt(sewa.duedays) : 0;
            $('#backdays').val(telat);
            $('#denda').val(telat*50000);
            $('#total_biaya').val(parseInt($('#denda').val())+parseInt($('#total').val()));
        }
    })

    var dataSepeda = <?= json_encode($dataSepeda) ?>;

    $.fn.save = function() {
        var trxno = $('#trxno').val();
        var tgl_sewa = $('#tgl_sewa').val();
        var duedays = $('#duedays').val();
        var pelanggan = $('#pelanggan').val();
        var nohp = $('#nohp').val();
        var alamat = $('#alamat').val();
        var sepeda_id = $('#sepeda_id').select2('val');
        var total = $('#total').val();
        var tgl_kembali = $('#tgl_kembali').val();
        var denda = $('#denda').val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('sewa/kembali/').$dataSewa[0]->id ?>",
            data: { 
                trxno: trxno, 
                tgl_sewa: tgl_sewa,
                duedays: duedays, 
                pelanggan: pelanggan, 
                nohp: nohp, 
                alamat: alamat, 
                sepeda_id_old : <?= $dataSewa[0]->sepeda_id ?>,
                sepeda_id : sepeda_id,
                total: total, 
                tgl_kembali: tgl_kembali,
                denda: denda
            },
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                    window.location.href = "<?= base_url('sewa/view/') ?>"+data.id;
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }

    $.fn.delete = function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('sewa/delete/').$dataSewa[0]->id ?>",
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    window.location.href = "<?= base_url('sewa') ?>";
                    jQuery('#toast-example-1').toast('show');
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }
</script>