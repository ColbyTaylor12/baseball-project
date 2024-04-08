<?php

require "config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams?teamId=138",
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

        foreach ($decoded->body as $team) {
            $new_team = array(
                "locationname" => $team->franchiseName,
                "teamname" => $team->teamName,
                "league"  => $team->league->name,
                "ref_id" => $team->id
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "teams",
                implode(", ", array_keys($new_team)),
                ":" . implode(", :", array_keys($new_team))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_team);

            echo "St. Louis team seeded successfully.";
        }
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams?teamId=112",
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

        foreach ($decoded->body as $team) {
            $new_team = array(
                "locationname" => $team->franchiseName,
                "teamname" => $team->teamName,
                "league"  => $team->league->name,
                "ref_id" => $team->id
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "teams",
                implode(", ", array_keys($new_team)),
                ":" . implode(", :", array_keys($new_team))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_team);

            echo "Chicago Cubs team seeded successfully.";
        }
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams?teamId=147",
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

        foreach ($decoded->body as $team) {
            $new_team = array(
                "locationname" => $team->franchiseName,
                "teamname" => $team->teamName,
                "league"  => $team->league->name,
                "ref_id" => $team->id
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "teams",
                implode(", ", array_keys($new_team)),
                ":" . implode(", :", array_keys($new_team))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_team);

            echo "Yankees team seeded successfully.";
        }
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://baseball4.p.rapidapi.com/v1/mlb/teams?teamId=140",
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

        foreach ($decoded->body as $team) {
            $new_team = array(
                "locationname" => $team->franchiseName,
                "teamname" => $team->teamName,
                "league"  => $team->league->name,
                "ref_id" => $team->id
              );

            $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "teams",
                implode(", ", array_keys($new_team)),
                ":" . implode(", :", array_keys($new_team))
            );

            $statement = $connection->prepare($sql);
            $statement->execute($new_team);

            echo "Rangers team seeded successfully.";
        }
    }
} catch(PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}

?>