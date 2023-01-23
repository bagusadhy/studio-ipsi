<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="pl-2 h3 mb-1 text-gray-800"><?= $title ?></h1>
    <p class="pl-2 mb-5 text-gray-800">Isi form pemesanan di bawah ini!</p>

    <div class="col-lg-6">
        <form method="POST" action="<?= base_url('user/pesan'); ?>?jasa_id=<?= $jasa['id']; ?>">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_jasa" name="id_jasa" value="<?= $jasa['id'] ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat') ?>">
                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="wa">Nomor Whatsapp</label>
                <input type="number" class="form-control" id="wa" name="wa" value="<?= set_value('wa') ?>">
                <?= form_error('wa', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="konsep">Konsep</label>
                <textarea class="form-control" id="konsep" name="konsep" aria-label="With textarea" value="<? set_value('konsep') ?>"></textarea>
                <?= form_error('konsep', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="text-right">
                <a href="<?= base_url('user/index'); ?>" class="btn btn-light btn-sm rounded-pill">Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm rounded-pill">Submit</button>
            </div>
        </form>
    </div>


    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->