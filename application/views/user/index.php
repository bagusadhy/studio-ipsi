<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">Jasa Desain</h1>
    <p class="mb-4 text-gray-800">Punya masalah dengan desain? Pesan aja di STUDIO IPSI</p>
    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <?php foreach ($jasa as $j) : ?>
            <div class="col-sm-3 mb-4">
                <div class="card" style="width: 250px; height:250px;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bolder"><?= $j['name']; ?></h4>
                        <p class="card-text" style="height: 100px;"><?= $j['deskripsi']; ?></p>
                        <div class="text-right">
                            <a href="<?= base_url('user/pesan'); ?>?jasa_id=<?= $j['id']; ?>" class="btn btn-primary btn-sm rounded-pill align-bottom ">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->