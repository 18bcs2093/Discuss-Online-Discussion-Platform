<?php

include("../common/db.php");

$query = "SELECT id, password FROM users";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {

    $id = $row['id'];
    $password = $row['password'];

    // PHP bcrypt hashes are 60 characters.
    // Hash only passwords that are not already 60-character bcrypt hashes.
    if (strlen($password) < 60) {

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $stmt = $conn->prepare(
            "UPDATE users SET password = ? WHERE id = ?"
        );

        $stmt->bind_param(
            "si",
            $hashedPassword,
            $id
        );

        $stmt->execute();

        echo "User ID $id → password hashed.<br>";

    } else {

        echo "User ID $id → skipped.<br>";
    }
}

echo "<br>Migration completed.";

?>