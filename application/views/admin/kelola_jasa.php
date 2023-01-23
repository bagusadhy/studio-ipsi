<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg">

            <a href="" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#modalTambahJasa">Tambah Jasa</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jasa</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jasa as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $j['name']; ?></td>
                            <td><?= $j['deskripsi']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/hapus_jasa') ?>?id=<?= $j['id']; ?>" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
                                <button class="btn btn-success btn-sm rounded-pill" data-toggle="modal" data-target="#modalEditJasa<?= $j['id']; ?>">Edit</button>
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



<!-- modal tambah jasa -->

<!-- Modal -->

<div class="modal fade" id="modalTambahJasa" tabindex="-1" aria-labelledby="modalTambahJasaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahJasaLabel">Tambah Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah_jasa') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jasa" name="jasa" placeholder="Nama jasa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi jasa">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal edit jasa -->



<?php
foreach ($jasa as $j) :

?>
    <!-- Modal -->
    <div class="modal fade" id="modalEditJasa<?= $j['id'] ?>" tabindex="-1" aria-labelledby="modalEditJasaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditJasaLabel">Edit Jasa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_jasa') ?>?id=<?= $j['id']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="jasa" name="jasa" value="<?= $j['name'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $j['deskripsi'] ?>">
                        </div>
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