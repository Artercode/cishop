<!-- profil -->
<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <!-- kolom kiri -->
        <?php $this->load->view('layouts/_menu'); ?>

        <!-- kolom kanan -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/avatar.jpg") ?>" alt="" height="150">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <p>Nama: <?= $content->name ?></p>
                            <p>Email: <?= $content->email ?></p>
                            <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- akhir profil -->