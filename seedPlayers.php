<?php

require "config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams-roster?teamIds=138",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: baseball4.p.rapidapi.com",
        "X-RapidAPI-Key: 3c1749555dmsh1fe9c5926a0cfc3p1aff24jsnbd023a2c45d5"
        ],
    ]);

    $TeamResponse = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($TeamResponse);
        $roster = $decoded->body->roster;
        // print_r($decoded->body->roster[0]);

        foreach ($roster as $player) {
            $new_player = array(
                "fullname" => $player->person->fullName,
                "currentTeam"  => $player->parentTeamId,
                "jerseyNumber" => $player->jerseyNumber,
                "position" => $player->position->name,
                "nickname" => ' '
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "players",
                implode(", ", array_keys($new_player)),
                ":" . implode(", :", array_keys($new_player))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_player);
        }
        echo "St. Louis roster seeded successfully.";
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams-roster?teamIds=112",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: baseball4.p.rapidapi.com",
        "X-RapidAPI-Key: 3c1749555dmsh1fe9c5926a0cfc3p1aff24jsnbd023a2c45d5"
        ],
    ]);

    $TeamResponse = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($TeamResponse);
        $roster = $decoded->body->roster;

        foreach ($roster as $player) {
            $new_player = array(
                "fullname" => $player->person->fullName,
                "currentTeam"  => $player->parentTeamId,
                "jerseyNumber" => $player->jerseyNumber,
                "position" => $player->position->name,
                "nickname" => ' '
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "players",
                implode(", ", array_keys($new_player)),
                ":" . implode(", :", array_keys($new_player))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_player);
        }
        echo "Cubs roster seeded successfully.";
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams-roster?teamIds=147",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: baseball4.p.rapidapi.com",
        "X-RapidAPI-Key: 3c1749555dmsh1fe9c5926a0cfc3p1aff24jsnbd023a2c45d5"
        ],
    ]);

    $TeamResponse = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($TeamResponse);
        $roster = $decoded->body->roster;

        foreach ($roster as $player) {
            $new_player = array(
                "fullname" => $player->person->fullName,
                "currentTeam"  => $player->parentTeamId,
                "jerseyNumber" => $player->jerseyNumber,
                "position" => $player->position->name,
                "nickname" => ' '
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "players",
                implode(", ", array_keys($new_player)),
                ":" . implode(", :", array_keys($new_player))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_player);
        }
        echo "Yankees roster seeded successfully.";
    }
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}

?>