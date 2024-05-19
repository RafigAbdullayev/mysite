<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcı adı ve şifre gönderilmiş mi kontrol et
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Öğrenci numarasını email adresinden ayır
        $studentNumber = explode('@', $username)[0];

        // Doğru kullanıcı adı ve şifre kontrolü
        $expectedEmail = $studentNumber . '@sakarya.edu.tr';
        $expectedPassword = $studentNumber;

        if ($username === $expectedEmail && $password === $expectedPassword) {
            echo "Hoşgeldiniz " . htmlspecialchars($studentNumber);
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        // Gerekli POST verileri gelmemişse login sayfasına yönlendir
        header("Location: login.php");
        exit();
    }
} else {
    // GET isteği ise login sayfasına yönlendir
    header("Location: login.php");
    exit();
}
?>



