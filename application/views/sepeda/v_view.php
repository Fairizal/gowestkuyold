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
            <a class="btn btn-danger" id="delete" onclick="$.fn.delete()">Hapus</a>
            <a href="<?= base_url('sepeda/update/').$dataSepeda[0]->id ?>" class="btn btn-success" id="update" style="margin-left: 10px">Ubah</a>
        </div>
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-12 col-xl-5">
                        <input type="hidden" name="id" id="id" value="<?= $dataSepeda[0]->id ?>">
                        <div class="form-group">
                            <label for="example-text-input">Nama</label>
                            <input type="text" class="form-control" id="nama" name="example-text-input" placeholder="Contoh : Polygon" disabled value="<?= $dataSepeda[0]->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Isi qty" value="<?= $dataSepeda[0]->qty ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Isi harga" value="<?= $dataSepeda[0]->harga ?>" disabled>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="<?= base_url('sepeda')?>" class="btn btn-alt-light" id="back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <!-- END Basic -->
</div>
<!-- END Page Content -->
<script type="text/javascript">

    $.fn.delete = function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('sepeda/delete/').$dataSepeda[0]->id ?>",
            dataType: 'json',
            // contentType: 'application/json',
            success: function(data) {
                if(data.status == true) {
                    $('#toastTitle').text('Berhasil');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                    window.location.href = "<?= base_url('sepeda') ?>";
                } else {
                    $('#toastTitle').text('Gagal');
                    $('#toastText').text(data.msg);
                    jQuery('#toast-example-1').toast('show');
                }
            }
        });
    }
</script>