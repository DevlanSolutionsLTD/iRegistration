<?php
include('../config/pdoconfig.php');

/* Get User ID Based On Email */
if (!empty($_POST["AuthUserEmail"])) {
    $id = $_POST['AuthUserEmail'];
    $stmt = $DB_con->prepare("SELECT * FROM users WHERE email = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['id']); ?>
<?php
    }
}
