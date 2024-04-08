<?php

try {
  require "../config.php";
  require "../common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $urlWParams = basename($_SERVER['REQUEST_URI']);
  parse_str($urlWParams, $urlParts);

  $sql = "SELECT *
    FROM players
    WHERE fullname = :fullname";

  $fullName = $urlParts["update_php?player"];

  $statement = $connection->prepare($sql);
  $statement->bindParam(':fullname', $fullName, PDO::PARAM_STR);
  $statement->execute();

  $result = $statement->fetchAll();


  if (isset($_POST['submit'])) {
    $sql = "UPDATE players
    SET nickname = :nickname
    WHERE fullname = :fullname";

    $nickname = $_POST['nickname'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':fullname', $fullName, PDO::PARAM_STR);
    $statement->bindParam(':nickname', $nickname, PDO::PARAM_STR);
    $statement->execute();
  }

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<h2>Update users</h2>

<table>
  <thead>
    <tr>
      <th>Full Name</th>
      <th>Number</th>
      <th>Position</th>
      <th>Nickname</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["fullname"]); ?></td>
      <td><?php echo escape($row["jerseyNumber"]); ?></td>
      <td><?php echo escape($row["position"]); ?></td>
      <td><?php echo escape($row["nickname"]); ?></td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<form method="post">
  <label for="nickname">Nickname</label>
  <input type="text" id="nickname" name="nickname">
  <input type="submit" name="submit" value="Add/Update Nickname">
</form>

<a href="index.php">Back to home</a>