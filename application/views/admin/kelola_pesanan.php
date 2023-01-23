<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Jenis Pesanan</th>
                        <th scope="col">Email</th>
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
                            <td><?= $p['email']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm rounded-pill" data-toggle="modal" data-target="#modalEditPesanan<?= $p['id']; ?>">Edit</button>
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

<!-- modal edit jasa -->



<?php
foreach ($pesanan as $p) :

?>
    <!-- Modal -->
    <div class="modal fade" id="modalEditPesanan<?= $p['id'] ?>" tabindex="-1" aria-labelledby="modalEditPesananLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPesananLabel">Edit Jasa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_pesanan') ?>?id=<?= $p['id']; ?>" method="POST">
                    <div class="form-check ml-3">
                        <input class="form-check-input " type="checkbox" value="3" id="status" name="status" checked>
                        <label class="form-check-label" for="status">
                            Selesai
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>