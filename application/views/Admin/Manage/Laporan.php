<!-- Page -->
<div class="page">
  <div class="page-header">
    <div class="card card-inverse" style="background-color: #589FFC">
      <div class="card-block">
        <h4 class="card-title">Stock Opaname</h4>
        <p class="card-text text-white">Lorem ipsum Dolor dolor enim Ut consequat tempor quis minim enim
          sit ad in qui Ut in ut elit minim quis eiusmod reprehenderit
          aute cillum consequat enim Ut veniam labore dolor anim quis
          ullamco in cupidatat dolore ut amet elit sint magna exercitation
          aliquip.</p>
      </div>
    </div>
  
    <!-- Panel Basic -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title">Data Stock</h6>
      </div>
      <div class="panel-body" style="padding: 35px;">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
            </tr>
          </thead>
            <?php $no=1; ?>
          <tbody>
            <?php foreach ($tb_opname as $opm): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $opm['kode_barang']?></td>
                <td><?= $opm['nama_barang']?></td>
                <td><?= $opm['jumlah']?></td>
                <td><?= $opm['masuk']?></td>
                <td><?= $opm['keluar']?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Panel Basic -->
  </div>
  </div>
  </div>
</div>
