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
            <a href="<?= base_url('karyawan/create')?>" class="btn btn-primary">Tambah</a>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Alamat</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">No.HP</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $idx = 1;
                        foreach ($dataKaryawan as $karyawan) {
                    ?>
                        <tr>
                            <td class="text-center font-size-sm"><?php echo $idx ?></td>
                            <td class="font-w600 font-size-sm"><?php echo $karyawan->nama ?></td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                <?php echo $karyawan->alamat ?>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <?php echo $karyawan->nohp ?>
                            </td>
                            <td>
                                <span><a href="<?= base_url('karyawan/view/') . $karyawan->id ?>" style="color: black"><i class="far fa-eye"></i></a></span>
                                <span><a href="<?= base_url('karyawan/update/') . $karyawan->id ?>" style="color: black"><i class="far fa-edit"></i></a></span>
                                <span><a onclick="$.fn.delete(<?=$karyawan->id ?>)" style="cursor: pointer"><i class="far fa-trash-alt"></i></a></span>
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
            url: "<?= base_url('karyawan/delete/') ?>"+id,
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                    window.location.href = "<?= base_url('karyawan') ?>";
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }
</script>