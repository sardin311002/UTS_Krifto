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

$conn = new mysqli("localhost", "nama", "tanggal_lahir","alamat","email","prodi", "mhs_from");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $a = 5; // Sesuaikan dengan nilai yang sesuai
    $b = 8; // Sesuaikan dengan nilai yang sesuai
    $encrypted_password = encryptAffineCipher($password, $a, $b);

    if ($encrypted_password === $row['password']) {
        echo "Login berhasil!";
    } else {
        echo "Password salah";
    }
} else {
    echo "Pengguna tidak ditemukan";
}

$conn->close();
?>