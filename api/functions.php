<?php
function getLogin($conn, $username)
{
    $query = $conn->prepare("SELECT * FROM user WHERE username=:username");
    $query->bindParam(":username", $username);
    if ($query->execute()) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function registerUser($conn, $username, $password, $confirmPassword, $fullName, $email, $phoneNumber, $role)
{
    if ($password !== $confirmPassword) {
        header("Location: /hukuk-projesi/kayit");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO user (username, password, fullname, email, phone_number, role) VALUES (?, ?, ?, ?, ?, ?)";


    try {

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hashedPassword);
        $stmt->bindParam(3, $fullName);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $phoneNumber);
        $stmt->bindParam(6, $role);
        $stmt->execute();
        header("Location: /hukuk-projesi/giris");
        exit();
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/kayit");
        exit();
    }
}


function createContact($conn, $name, $email, $message)
{
    $query = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $message);
        $stmt->execute();
        header("Location: /hukuk-projesi/anasayfa");
        exit();
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/iletisim");
        exit();
    }
}

function getAllMessages($conn)
{
    $query = $conn->prepare("SELECT * FROM contact ORDER BY created_at DESC");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getAllUsers($conn)
{
    $query = $conn->prepare("SELECT * FROM user");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}
function getAllLawyers($conn)
{
    $query = $conn->prepare("SELECT * FROM lawyer");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getLawyer($conn, $id)
{
    $query = $conn->prepare("SELECT * FROM lawyer WHERE id=:id");
    $query->bindParam(":id", $id);
    if ($query->execute()) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function updateUserRole($conn, $id, $role)
{
    $query = "UPDATE user SET role = ? WHERE id = ?";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $role);
        $stmt->bindParam(2, $id);
        $stmt->execute();
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/anasayfa");
    }
}

function createLawyer($conn, $fullname, $graduation_school, $profession, $mail, $experience, $resume, $image)
{
    $query = "INSERT INTO lawyer (fullname, graduation_school, profession, mail,experience,resume, image) VALUES (?, ?, ?, ?, ?,?,?)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $fullname);
        $stmt->bindParam(2, $graduation_school);
        $stmt->bindParam(3, $profession);
        $stmt->bindParam(4, $mail);
        $stmt->bindParam(5, $experience);
        $stmt->bindParam(6, $resume);
        $stmt->bindParam(7, $image);
        $stmt->execute();
        header("Location: /hukuk-projesi/avukatlar");
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/avukatekle");
    }
}

function createService($conn, $title, $description, $image)
{
    $query = "INSERT INTO service (title, description, image) VALUES (?, ?, ?)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $image);
        $stmt->execute();
        header("Location: /hukuk-projesi/hizmetler");
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/hizmetEkle");
    }
}
function getAllServices($conn)
{
    $query = $conn->prepare("SELECT * FROM service");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getService($conn, $id)
{
    $query = $conn->prepare("SELECT * FROM service WHERE id=:id");
    $query->bindParam(":id", $id);
    if ($query->execute()) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function createComment($conn, $user_id, $service_id, $content)
{
    $query = "INSERT INTO comment (user_id,service_id, content) VALUES (?,?, ?)";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->bindParam(2, $service_id);
        $stmt->bindParam(3, $content);
        $stmt->execute();
        header("Location: /hukuk-projesi/hizmetler?id=$service_id");
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/hizmetler?id=$service_id");
    }
}
function deleteService($conn, $id)
{
    $query = "DELETE FROM service WHERE id = ?";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        header("Location: /hukuk-projesi/hizmetler");
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/hizmetler");
    }
}

function deleteLawyer($conn, $id)
{
    $query = "DELETE FROM lawyer WHERE id = ?";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        header("Location: /hukuk-projesi/avukatlar");
    } catch (PDOException $e) {
        print_r("Hata oluştu" . $e);
        header("Location: /hukuk-projesi/avukatlar");
    }
}

function getAllComments($conn, $service_id)
{
    $query = $conn->prepare("SELECT * FROM comment WHERE service_id=:service_id ORDER BY created_at DESC");
    $query->bindParam(":service_id", $service_id);
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}
