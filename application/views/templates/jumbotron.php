<script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
</script>

<!-- awal navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="#" >SULTENG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth'); ?>">Home</a>
        </li>
        <li class="nav-item">
        <div onclick="myFunction()"  class="nav-link dropdown">
          <a class="dropbtn">Pariwisata</a>
          <div id="myDropdown" class="dropdown-content" style="border-radius:10px;">
            <a href="<?= base_url('sulteng/alam'); ?>">Wisata Alam</a>
            <a href="<?= base_url('sulteng/kuliner'); ?>">Wisata Kuliner</a>
            <a href="<?= base_url('sulteng/religi'); ?>">Wisata Religi</a>
            <a href="<?= base_url('sulteng/sejarah'); ?>">Wisata Sejarah</a>
            <a href="<?= base_url('sulteng/budaya'); ?>">Kebudayaan</a>
          </div>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('sulteng/Cerita'); ?>">Cerita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('sulteng/tentang_kami'); ?>">Tentang Kami</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<!--akhir navbar-->
