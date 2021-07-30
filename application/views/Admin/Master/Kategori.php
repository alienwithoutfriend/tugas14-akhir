
<!-- Page -->
<div class="page">
  <div class="page-header">
    <div class="card card-inverse" style="background-color: #589FFC">
      <div class="card-block">
        <h4 class="card-title">Kelola Kategori</h4>
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
          <h6 class="panel-title">Input Data Kategori</h6>
        </div>
        <div class="panel-body" style="padding:10px">    
            <?php if (isset($_GET['id'])): ?>
              <form action="<?= base_url().'Admin/UpdateKategori'?>" method="post">
            <?php else: ?>
              <form action="<?= base_url().'Admin/InsertKategori'?>" method="post">  
            <?php endif; ?>

            <div class="form-group"><br>
              <?php if (isset($_GET['id'])): ?>
                <input type="text" class="form-control" name="kdkategori" required readonly value="<?= $data->kode_kategori ?>">  
              <?php else: ?>
                  <input type="text" class="form-control" name="kdkategori" required readonly value="<?= $kode_kategori?>">
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label class="col-xl-12 col-md-3 form-control-label">Nama Kategori
                <span class="required">*</span>
              </label>
              <?php if (isset($_GET['id'])): ?>
                <input type="text" class="form-control" name="nkategori" required value="<?= $data->nama_kategori ?>" autocomplete="off">  
              <?php else: ?>
                <input type="text" class="form-control" name="nkategori" required="required" autocomplete="off">
              <?php endif; ?>
            </div>
            <div class="text-right">
            <a href="<?= base_url('kelola-kategori')?>" class="btn btn-danger"><i class="wb-close"></i> Batal</a>
            <button type="submit" class="btn btn-info"><i class="wb-check" aria-hidden="true"></i> Simpan</button>
            </div>
          </form>
            <?php if (isset($_GET['id'])): ?>
              </form>
            <?php else: ?>
              </form>
            <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Panel Basic -->
    <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h6 class="panel-title">Data Kategori</h6>
      </div>
      <div class="panel-body" style="padding: 35px">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Kategori</th>
              <th>Kategori</th>
              <th>Delete / Edit</th>
            </tr>
          </thead>
          <?php $no=1; ?>
          <tbody>
            <?php foreach ($tb_kategori as $ktg): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $ktg['kode_kategori']?></td>
              <td style="text-transform: capitalize;"><?= $ktg['nama_kategori']?></td>
              <td align="center" class="action">
                <a href="<?= base_url('Admin/deleteKtg/'.$ktg['kode_kategori'])?>" data-original-title="Delete" class="btn btn-xs btn-icon btn-pure btn-danger wb-trash on-default remove-row" data-toggle="tooltip"></a>
                <a href="?id=<?= $ktg['kode_kategori']?>" class="btn btn-xs btn-icon btn-pure btn-info wb-edit" data-original-title="Edit" data-toggle="tooltip"></a>
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
