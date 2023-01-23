<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Pesanan Masuk</h1>
    <div class="row">
        <div class="col-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Jenis Pesanan</th>
                        <th scope="col">Konsep</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>



                    <?php $i = 1; ?>
                    <?php foreach ($pesanan as $p) : ?>

                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['tanggal_pemesanan']; ?></td>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['konsep']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/proses_pesanan') ?>?action=1&&id=<?= $p['id']; ?>" class="btn btn-danger btn-sm rounded-pill">Tolak</a>
                                <a href="<?= base_url('admin/proses_pesanan') ?>?action=2&&id=<?= $p['id']; ?>" class="btn btn-success btn-sm rounded-pill">Proses</a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->