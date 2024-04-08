<?php

if (isset($_POST['submit'])) {
  try {
    require "../config.php";
    require "../common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM players
    INNER JOIN teams ON players.currentTeam=teams.ref_id
    WHERE currentTeam = :currentTeam";

    $currentTeam = $_POST['currentTeam'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':currentTeam', $currentTeam, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
      <thead>
<tr>
  <th>Full Name</th>
  <th>Jersey Number</th>
  <th>Current Team</th>
  <th>League</th>
  <th>Position</th>
  <th>Nickname</th>
  <th>Edit Link</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["fullname"]); ?></td>
<td><?php echo escape($row["jerseyNumber"]); ?></td>
<td><?php echo escape($row["teamname"]); ?></td>
<td><?php echo escape($row["league"]); ?></td>
<td><?php echo escape($row["position"]); ?></td>
<td><?php echo escape($row["nickname"]); ?></td>
<td><a href="update.php?player=<?php echo $row["fullname"] ?>"><b>Edit Nickname</b></a></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['currentTeam']); ?>.
  <?php }
} ?>

<h2>Find player based on team ID</h2>

<form method="post">
  <label for="currentTeam">Current Team</label>
  <input type="text" id="currentTeam" name="currentTeam">
  <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>