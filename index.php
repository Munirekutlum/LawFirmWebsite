<?php
session_abort();
session_start();
?>
<?php require("api/functions.php"); ?>
<?php require("api/connection.php"); ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/carousel.css" rel="stylesheet">
    <link href="./dist/output.css" rel="stylesheet">
    <?php require("./components/cdn.php"); ?>

</head>

<body>
    <?php
    require("./components/topbar.php");
    require("./components/navbar.php");
    ?>
    <div>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'anasayfa':
                    require './pages/homepage.php';
                    require("./components/footer.php");
                    break;
                case 'iletisim':
                    require './pages/contact.php';
                    require("./components/footer.php");
                    break;
                case 'giris':
                    require './pages/login.php';
                    break;
                case 'kayit':
                    require './pages/register.php';
                    break;
                case 'mesajlar':
                    require './pages/messages.php';
                    require("./components/footer.php");
                    break;
                case 'kullanicilar':
                    require './pages/users.php';
                    require("./components/footer.php");
                    break;
                case 'hizmetler':
                    if (isset($_GET['id'])) {
                        $serviceId = $_GET['id'];
                        require './pages/serviceContent.php';
                    } else {
                        require './pages/services.php';
                    }
                    require("./components/footer.php");
                    break;
                case 'hizmetekle':
                    require './pages/createService.php';
                    break;
                case 'avukatlar':
                    if (isset($_GET['id'])) {
                        $lawyerId = $_GET['id'];
                        require './pages/lawyerProfile.php'; // avukat sayfasını yükle
                    } else {
                        require './pages/lawyers.php';
                    }
                    require("./components/footer.php");
                    break;
                case 'avukatekle':
                    require './pages/createLawyer.php';
                    break;
                default:
                    require './pages/nopage.php';
                    break;
            }
        } else {
            // Varsayılan olarak ana sayfayı yükle
            require './pages/homepage.php';
            require("./components/footer.php");
        }
        ?>
    </div>

    <?php if (@$_SESSION["alert"] == "passwordSuccess") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Giriş Başarılı',
                text: 'Giriş Başarılı',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php elseif (@$_SESSION["alert"] == "loginError") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Giriş Başarısız',
                text: 'Kullanıcı bilgileriniz hatalı',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>
    <?php if (@$_SESSION["alert"] == "registerSuccess") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Kayıt Başarılı',
                text: 'Kayıt Başarılı',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php elseif (@$_SESSION["alert"] == "registerError") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Kayıt Başarısız',
                text: 'Kayıt Başarısız',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php elseif (@$_SESSION["alert"] == "passwordNotMatch") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Şifreler Eşleşmiyor',
                text: 'Şifreler Eşleşmiyor',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php elseif (@$_SESSION["alert"] == "passwordLengthError") : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Şifre 6 Karakterden Kısa',
                text: 'Şifre 6 Karakterden Kısa',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>
    <?php if (@$_SESSION["alert"] == "createServiceSuccess") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hizmet Başarıyla Eklendi',
                text: 'Hizmet Başarıyla Eklendi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>

    <?php if (@$_SESSION["alert"] == "createLawyerSuccess") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Avukat Başarıyla Eklendi',
                text: 'Avukat Başarıyla Eklendi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>

    <?php if (@$_SESSION["alert"] == "createContactSuccess") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Mesajınız Başarıyla Gönderildi',
                text: 'Mesajınız Başarıyla Gönderildi',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php endif; ?>


    <?php unset($_SESSION["alert"]); ?>

</body>

</html>