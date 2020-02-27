<!-- admin users -->
<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <span>Pengguna</span>
                    <a href="admin-users-form.html" class="btn btn-sm btn-secondary">Tambah</a>
                    <div class="float-right">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-cotrol form-control-sm text-center" placeholder="Cari">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <a href="#" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eraser"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pengguna</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($content as $row) : $no++; ?>
                                <tr>
                                    <td><? $no ?></td>
                                    <td>
                                        <p>
                                            <img src="<?= $row->image ? base_url("images/user/$row->image") : base_url("images/user/avatar.jpg") ?>" alt="" height="50">
                                            <?= $row->name ?>
                                        </p>
                                    </td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->role ?></td>
                                    <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                    <td>
                                        <a href="#">
                                            <button class="btn btn-sm">
                                                <i class="fas fa-edit text-info"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-sm" onclick="return confirm('Are You Sure?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- row pagination -->
                    <nav aria-label="Page navigation example">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- akhir admin users -->