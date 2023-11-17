<?php

function encrypt($plaintext, $a, $b)
{
    $ciphertext = '';
    $length = strlen($plaintext);

    for ($i = 0; $i < $length; $i++) {
        $char = $plaintext[$i];

        if (ctype_alpha($char)) {
            $isUpper = ctype_upper($char);
            $char = strtoupper($char);

            $ascii = ord($char) - ord('A');
            $encryptedAscii = ($a * $ascii + $b) % 26;
            $encryptedChar = chr($encryptedAscii + ord('A'));

            if (!$isUpper) {
                $encryptedChar = strtolower($encryptedChar);
            }

            $ciphertext .= $encryptedChar;
        } else {
            $ciphertext .= $char;
        }
    }

    return $ciphertext;
}

function decrypt($ciphertext, $a, $b)
{
    $plaintext = '';
    $aInverse = modInverse($a, 26);
    $length = strlen($ciphertext);

    for ($i = 0; $i < $length; $i++) {
        $char = $ciphertext[$i];

        if (ctype_alpha($char)) {
            $isUpper = ctype_upper($char);
            $char = strtoupper($char);

            $ascii = ord($char) - ord('A');
            $decryptedAscii = $aInverse * ($ascii - $b + 26) % 26;
            $decryptedChar = chr($decryptedAscii + ord('A'));

            if (!$isUpper) {
                $decryptedChar = strtolower($decryptedChar);
            }

            $plaintext .= $decryptedChar;
        } else {
            $plaintext .= $char;
        }
    }

    return $plaintext;
}

function modInverse($a, $m)
{
    $m0 = $m;
    $x0 = 0;
    $x1 = 1;

    while ($a > 1) {
        $q = intval($a / $m);
        $t = $m;

        $m = $a % $m;
        $a = $t;

        $t = $x0;
        $x0 = $x1 - $q * $x0;
        $x1 = $t;
    }

    if ($x1 < 0) {
        $x1 += $m0;
    }

    return $x1;
}

// Input data
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];

// Konfigurasi Affine Cipher
$a = 5; // Nilai kunci a (harus relatif prima dengan 26)
$b = 8; // Nilai kunci b

// Enkripsi data
$encrypted_nama = encrypt($nama, $a, $b);
$encrypted_tanggal_lahir = encrypt($tanggal_lahir, $a, $b);
$encrypted_alamat = encrypt($alamat, $a, $b);
$encrypted_email = encrypt($email, $a, $b);
$encrypted_prodi = encrypt($prodi, $a, $b);

// Membuat file Affine Cipher
$file_content = "<?php\n\n\$a = $a;\n\$b = $b;\n\n?>";
file_put_contents('affine_key.php', $file_content);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affine Cipher</title>
</head>
<body>
    <h2>Data Hasil Enkripsi</h2>
    <ul>
        <li><strong>Nama:</strong> <?php echo $encrypted_nama; ?></li>
        <li><strong>Tanggal Lahir:</strong> <?php echo $encrypted_tanggal_lahir; ?></li>
        <li><strong>Alamat:</strong> <?php echo $encrypted_alamat; ?></li>
        <li><strong>Email:</strong> <?php echo $encrypted_email; ?></li>
        <li><strong>Prodi:</strong> <?php echo $encrypted_prodi; ?></li>
    </ul>
</body>
</html>
