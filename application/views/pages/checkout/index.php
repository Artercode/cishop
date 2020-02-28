<!-- checkout -->
<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <!-- kolom kanan -->
        <div class="col-md-8">
            <!-- formulir -->
            <div class="card">
                <div class="card-header">
                    Formulir Alamat Pengiriman
                </div>
                <div class="card-body">
                    <form action="" class="">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama penerima">
                            <small class="form-text text-danger">Nama harus diisi.</small>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                            <small class="form-text text-danger">Alamat harus diisi</small>
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan nomer telepon penerima">
                            <small class="form-text text-danger">Nomer telepon harus diisi.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir kolom kanan -->
        <!-- kolon kiri -->
        <div class="col-md-4">
            <!-- total pembayaran -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cart
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->qty ?></td>
                                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir kolom kiri -->
    </div>
</main>
<!-- akhir checkout -->