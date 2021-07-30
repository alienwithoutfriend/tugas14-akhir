<!-- Page -->
<div class="page">
  <div class="page-header">
    <div class="card card-inverse" style="background-color: #589FFC">
      <div class="card-block">
        <h4 class="card-title">Barang Masuk</h4>
        <p class="card-text text-white">Lorem ipsum Dolor dolor enim Ut consequat tempor quis minim enim
          sit ad in qui Ut in ut elit minim quis eiusmod reprehenderit
          aute cillum consequat enim Ut veniam labore dolor anim quis
          ullamco in cupidatat dolore ut amet elit sint magna exercitation
          aliquip.</p>
      </div>
    </div>
  </div>
  
  <div class="page-content">
    <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title">Barang Masuk</h6>
        </div>
        <div class="panel-body" style="padding:10px">    
            <?php if (isset($_GET['id'])): ?>
              <form action="<?= base_url().'Admin/UpdateMasuk'?>" method="post">
            <?php else: ?>
              <form method="post" action="<?= base_url().'Admin/BarangMasuk'?>">
            <?php endif; ?>
            <div class="form-group">
              <div class="example">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                  </div>
                <?php if (isset($_GET['id'])): ?>
                  <input type="date" class="form-control" name="tgl" required="required" value="<?= $data->tanggal ?>">
                <?php else: ?>
                  <input type="date" class="form-control" name="tgl" required="required" >
                <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php if (isset($_GET['id'])): ?>
                <input type="hidden" name="id" value="<?= $data->id_masuk ?>">
              <?php endif; ?>
              <label class="col-xl-12 col-md-3 form-control-label">Nama Barang
                <span class="required">*</span>
              </label>
              <select class="form-control" name="kdbrg" required="required" style="text-transform: capitalize;">
                  <option disabled="disabled" selected>--- Pilih Barang ---</option>
                  <?php 

                    $query = $this->db->query("select * from tb_barang");

                    foreach ($query->result_array() as $row) {
                    ?>

                    <option value="<?= $row['kode_barang'];?>">
                      <?= $row['nama_barang'];?>
                    </option>
                    <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label class="col-xl-12 col-md-3 form-control-label">Jumlah
                <span class="required">*</span>
              </label>
              
              <?php if (isset($_GET['id'])): ?>
                <input type="text" class="form-control" name="nstock" required value="<?= $data->stock ?>" autocomplete="off">  
              <?php else: ?>
                <input type="text" class="form-control" name="nstock" required="required" autocomplete="off">
              <?php endif; ?>
            </div>
            <div class="text-right">
              <a href="<?= base_url('barang-masuk')?>" class="btn btn-danger"><i class="wb-close"></i> Batal</a>
              <button type="submit" class="btn btn-info"><i class="wb-check" aria-hidden="true"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Panel Basic -->
    <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title">Data Barang Masuk</h6>
      </div>
      <div class="panel-body" style="padding: 35px;">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Delete / Edit</th>
            </tr>
          </thead>
          <?php $no=1; ?>
          <tbody>
            <?php foreach ($br_masuk as $msk): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $msk['tanggal'] ?></td>
                <td style="text-transform: capitalize;"><?= $msk['nama_barang'] ?></td>
                <td><?= $msk['stock'] ?></td>
                <td align="center">
                  <a href="<?= base_url('Admin/deleteMsk/'.$msk['id_masuk'])?>" data-original-title="Delete" class="btn btn-xs btn-icon btn-pure btn-danger wb-trash" data-toggle="tooltip"></a>
                  <a href="?id=<?= $msk['id_masuk'] ?>" class="btn btn-xs btn-icon btn-pure btn-info wb-edit" data-original-title="Edit" data-toggle="tooltip"></a>
                </td>
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
