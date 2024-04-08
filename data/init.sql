CREATE DATABASE test;

  use test;

  CREATE TABLE teams (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    locationname VARCHAR(30) NOT NULL,
    teamname VARCHAR(30) NOT NULL,
    league VARCHAR(30) NOT NULL,
    ref_id INT(11) UNSIGNED
  );CREATE TABLE players (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    jerseyNumber INT(3),
    currentTeam VARCHAR(50) NOT NULL,
    position VARCHAR(30),
    nickname VARCHAR(50)
  );