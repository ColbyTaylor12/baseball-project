# Baseball Project

This is a php based project that pulls team and roster data for MLB teams.

## How To Setup

After starting the application navigate to public/index.php\
Then click on Init DB to initialize the database and navigate back to the index.\
Next click on seed team data to seed the team data into the db then navigate back to the index.\
After that you will click seed player data on the index page and the application should be good to go.

## How to use the application

From the index page you can navigate to the read page.\
On this page you can use the following team Ids to search by: 147 for the Yankees, 112 for the Chicago Cubs and 138 for the St. Louis Cardinals\
Searching by one of those ids should return a table with roster data.\
Each player will start with an empty nickname field but will have a link to edit the nickname.\
On the edit page you will be able to add/update a nickname for the player.\
If you go back to the read page and load the data again you will be able to see the now updated nickname value.
