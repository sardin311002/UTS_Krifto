<?php

function encrip($text, $a, $b){
    $result = "";
    $text = strtoupper($text);

    for ($i=0; $i <strlen($text); $i++) { 
        $char = $text[$i];

        if ($char != ' ') {
            if (ctype_alpha($char)) {
                // Enkripsi huruf
                $result .= chr((($a * (ord($char) - 65) + $b) % 26) + 65);
            } else {
                // Karakter selain huruf (misalnya angka atau simbol) akan ditambahkan tanpa dienkripsi
                $result .= $char;
            }
        } else {
            $result .= " ";
        }
    }
    return $result;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $prodi = $_POST['prodi'];

    $a = 5;
    $b = 8;

    $encripnama = encrip($nama, $a, $b);
    $encriptgl = encrip($tanggal_lahir, $a, $b); 
    $encripalamat = encrip($alamat, $a, $b);
    $encripemail = encrip($email, $a, $b);
    $encripprodi = encrip($prodi, $a, $b);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mhs_from";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Gagal Koneksi: " . $conn->connect_error);
    }

    $sql = "INSERT INTO regis (nama, tanggal_lahir, alamat, email, prodi) VALUES ('$encripnama', '$encriptgl', '$encripalamat', '$encripemail', '$encripprodi')";
    
    if($conn->query($sql) === TRUE){
        // echo "DAFTAR BERHASIL";
        header("Location: formulir.php");
    } else {
        echo "ERROR: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>