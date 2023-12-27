<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
  <div class="row mt-5">
    <div class="col-sm p-2">
    <form action="registrasi.php" method="post">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Tanggal Lahir</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_lahir">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Alamat</label>
    <input type="tetx" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Program Studi</label>
    <select class="form-control" id="exampleFormControlSelect1" name="prodi">
      <option>Teknik Informatika</option>
      <option>Teknik Industri</option>
      <option>Teknik Lingkungan</option>
      <option>Managenman</option>
      <option>Hukum</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <div class="col-sm">
    <div class="card">
  <div class="card-header">
    Petunjuk Pengisian Formulir
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>1. Isilah nama lengkap calon mahasiswa baru dengan teks besar contoh <b>ABDUL MALIK</b></p>
      <P>2. Isilah Tanggal Lahir dengan Format Tanggal Bulan dan Tahun Contoh <b>29-Agustus-2000</b></P>
      <P>3. Isilah Alamat sesui dengan KTP calon Mahasiswa Baru</P>
      <p>4. Isilan email yang valid contoh <b>Abdul.Malik@gmail.com</b></p>
      <p>5. Isilah Program Studi yang diminati</p>
      <p>Jika ada kendala dalam pengisian formulir hubungi nomor atau email di bawah ini</p>
      <footer class="blockquote-footer"> sigap@gmail.com <cite title="Source Title">+6281586579205</cite></footer>
    </blockquote>
  </div>
</div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>