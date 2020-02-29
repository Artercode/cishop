<!-- Orders -->
<main role="main" class="container">
    <div class="row">
        <!-- kolom kiri -->
        <?php $this->load->view('layouts/_menu'); ?>
        <!-- kolom kanan -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Daftar Orders
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomer</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- menunggu pembayaran -->
                            <tr>
                                <td><a href="orders-detail.html"><strong>#012341234</strong></a></td>
                                <td>2019/05/20</td>
                                <td>Rp300.000,-</td>
                                <td>
                                    <span class="badge badge-pill badge-warning">Menungu Pembayaran</span>
                                </td>
                            </tr>
                            <!-- dikirim -->
                            <tr>
                                <td><a href="orders-detail.html"><strong>#012341234</strong></a></td>
                                <td>2019/05/19</td>
                                <td>Rp300.000,-</td>
                                <td>
                                    <span class="badge badge-pill badge-success">Dikirim</span>
                                </td>
                            </tr>
                            <!-- dibatalkan -->
                            <tr>
                                <td><a href="orders-detail.html"><strong>#012341234</strong></a></td>
                                <td>2019/05/10</td>
                                <td>Rp300.000,-</td>
                                <td>
                                    <span class="badge badge-pill badge-danger">Dibatalkan</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- akhir orders -->