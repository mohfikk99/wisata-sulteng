<div class="container-fluid">

  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>

      <?= $this->session->flashdata('massage'); ?>

  <div class="row mt-5" style="color:black; font-family:arial;">
        <div class="col-sm-6">
          <div class="text-center">
            <h5>Profile</h5>
            <span>_______________</span>
          </div>
          <div class="container mt-5 mb-5" style="background-color:#990900; width:100%; border-radius:10px;">
                <div class="row">
                    <div class="col-sm-12">
                    <table>
                      <tr>
                        <td>
                          <p class="text-center mt-3 mb-5">SULAWESI TENGAH berada di kawasan Indonesia timur, yang menyimpan keindahan tersembunyi di garis Khatulistiwa. <br>
                              Kami memberikan informasi Pariwsiata yang anda butuhkan untuk menambah daftar perjalanan wisata anda. Dilengkapi dengan <strong>Peta penyebaran
                              lokasi wisata </strong>  dan anda bisa melihat <strong>rute perjalan </strong> dari lokasi anda ke tempat wisata, serta anda bisa menyimpan dan membagikan <strong> histori cerita </strong> perjalanan wisata anda.   <br>
                              Nikmatilah keindahan khatulistiwa yang tersaji secara indah, akurat, dan terpercaya yang akan menemani
                              perjalanan dan petualangan anda, dimanapun kapanpun </p>
                        
                        <p><b>Email     : admin@wisatasulteng.com</b></p>
                        <p><b>Instagram : @wisatasulteng.com_</b></p>
                        <p><b>Whatsapp  : 082282425364</b></p>
                        </td>
                      </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="text-center">
                <h5>Kontak</h5>
                <span>_______________</span>
            </div>
            <div class="container mt-5" style="background-color:#990900; width:100%; border-radius:10px;">
                <div class="row">
                    <div class="col-sm-12">
                    <form action="<?= base_url('sulteng/tentang_kami');?>" method="post" class="mt-5">
                        <div class="form-group">
                            <label  for="nama"><p>Nama *</p></label>
                            <input type="text" class="form-control form-control-user" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nama"><p>Email *</p></label>
                            <input type="text" class="form-control form-control-user" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="nama"><p>Pesan *</p></label>
                            <textarea style="width:100%; height:150px" name="pesan" id="pesan" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" >Kirim</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
