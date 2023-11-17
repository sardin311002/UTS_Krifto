<?php
function encryptAffineCipher($text, $a, $b) {
    $result = "";
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $char = strtoupper($char);
            $encryptedChar = ($a * (ord($char) - ord('A')) + $b) % 26 + ord('A');
            $encryptedChar = chr($encryptedChar);
            if (!$isUpperCase) {
                $encryptedChar = strtolower($encryptedChar);
            }
            $result .= $encryptedChar;
        } else {
            $result .= $char;
        }
    }
    return $result;
}

$conn = new mysqli("localhost", "root", "", "mhs_from");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['nama'];
$password = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];

$a = 5; // Sesuaikan dengan nilai yang sesuai
$b = 8; // Sesuaikan dengan nilai yang sesuai
$encrypted_password = encryptAffineCipher($password,$username,$alamat,$email,$prodi, $a, $b);

$sql = "INSERT INTO regis (nama, tanggal_lahir, alamat, email, prodi) VALUES ('$encrypted_password')";
$result = $conn->query($sql);

if ($result) {
    echo "Registrasi berhasil!";
} else {
    echo "Registrasi gagal: " . $conn->error;
}

$conn->close();
?>