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
    <!-- Dynamic Table Simple -->
    <div class="block block-rounded">
        <div class="block-header">
            <h3 class="block-title">Daftar <?php echo $title ?></h3>
        </div>
        <div class="block-content block-content-full">
            <a href="<?= base_url('sewa/create')?>" class="btn btn-primary">Tambah</a>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>No. Transaksi</th>
                        <th>Tgl. Sewa</th>
                        <th>Lama Pinjam</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th style="width: 12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $idx = 1;
                        foreach ($dataSewa as $sewa) {
                    ?>
                        <tr>
                            <td class="text-center font-size-sm"><?php echo $idx ?></td>
                            <td class="font-w400 font-size-sm"><?php echo $sewa->trxno ?></td>
                            <td class="font-w400 font-size-sm"><?php echo $sewa->tgl_sewa ?></td>
                            <td class="font-w400 font-size-sm"><?php echo $sewa->duedays ?></td>
                            <td class="font-w400 font-size-sm"><?php echo $sewa->pelanggan ?></td>
                            <td class="font-w400 font-size-sm"><?php echo $sewa->isback ? 'Dikembalikan' : 'Dipinjam' ?></td>
                            <td>
                                <?php if($sewa->isback){?>
                                    <span><a href="<?= base_url('sewa/kembali/') . $sewa->id ?>" style="color: black"><i class="fa fa-reply"></i></a></span>
                                <?php } else {?>
                                    <span><a href="<?= base_url('sewa/view/') . $sewa->id ?>" style="color: black"><i class="far fa-eye"></i></a></span>
                                    <span><a href="<?= base_url('sewa/update/') . $sewa->id ?>" style="color: black"><i class="far fa-edit"></i></a></span>
                                    <span><a onclick="$.fn.delete(<?=$sewa->id ?>)" style="cursor: pointer"><i class="far fa-trash-alt"></i></a></span>
                                    <span><a href="<?= base_url('sewa/kembali/') . $sewa->id ?>" style="color: black"><i class="fa fa-reply"></i></a></span>
                                <?php }?>
                            </td>
                        </tr>
                    <?php
                        $idx++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Simple -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    $.fn.delete = function(id) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('sewa/delete/') ?>"+id,
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                    window.location.href = "<?= base_url('sewa') ?>";
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }
</script>