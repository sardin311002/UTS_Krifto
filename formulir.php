<?php
// Fungsi enkripsi
// function encrypt($text, $a, $b){
//     $result = "";
//     $text = strtoupper($text);

//     for ($i=0; $i <strlen($text); $i++) { 
//         $char = $text[$i];

//         if ($char != ' ') {
//             if (ctype_alpha($char)) {
//                 // Enkripsi huruf
//                 $result .= chr((($a * (ord($char) - 65) + $b) % 26) + 65);
//             } else {
//                 // Karakter selain huruf (misalnya angka atau simbol) akan ditambahkan tanpa dienkripsi
//                 $result .= $char;
//             }
//         } else {
//             $result .= " ";
//         }
//     }
//     return $result;
// }

// Fungsi dekripsi
function decrypt($text, $a, $b){
    $result = "";
    $text = strtoupper($text);

    for ($i=0; $i < strlen($text); $i++) { 
        $char = $text[$i];

        if ($char != ' ') {
            if (ctype_alpha($char)) {
                // Dekripsi huruf
                $result .= chr(modInverse($a, 26) * (ord($char) - 65 - $b + 26) % 26 + 65);
            } else {
                // Karakter selain huruf (misalnya angka atau simbol) akan ditambahkan tanpa didekripsi
                $result .= $char;
            }
        } else {
            $result .= " ";
        }
    }
    return $result;
}

function modInverse($a, $m) {
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return 1;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mhs_from";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Gagal Koneksi: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM regis";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output data of each row
            echo '<!DOCTYPE html>
                  <html lang="en">
                  <head>
                      <meta charset="UTF-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <title>Data Mahasiswa</title>
                      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
                  </head>
                  <body>
                  <div class="container">
                  <h2>Data Mahasiswa</h2>
                          <div class="row mt-3">
                              <div class="col">
                                  <table class="table">
                                      <thead class="thead-dark">
                                          <tr>
                                              <th scope="col">Nama Mahasiswa</th>
                                              <th scope="col">Tanggal Lahir</th>
                                              <th scope="col">Alamat</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Prodi</th>
                                          </tr>
                                      </thead>
                                      <tbody>';
            while ($row = $result->fetch_assoc()) {
                $nama = decrypt($row['nama'], 5, 8);
                $tanggal_lahir = decrypt($row['tanggal_lahir'], 5, 8);
                $alamat = decrypt($row['alamat'], 5, 8);
                $email = decrypt($row['email'], 5, 8);
                $prodi = decrypt($row['prodi'], 5, 8);

                echo '<tr>
                          <td>' . $nama . '</td>
                          <td>' . $tanggal_lahir . '</td>
                          <td>' . $alamat . '</td>
                          <td>' . $email . '</td>
                          <td>' . $prodi . '</td>
                      </tr>';
            }
            echo '</tbody>
                  </table>
              </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
  </html>';
        } else {
            echo "Tidak ada data dalam database.";
        }
    } else {
        throw new Exception("Error: " . $conn->error);
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
