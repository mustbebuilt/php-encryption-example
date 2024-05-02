# Basic MySQL / PHP encrytion example

## Registration Logic

The `process/userRegistration.php` file checks if the provided user login and password are valid, and if the user with the same login does not already exist in the database. If the registration process is successful, it inserts the new user into the database.

- The script starts by including the necessary files: sessions.inc.php and conn.inc.php. The sessions.inc.php file handles user sessions, and conn.inc.php establishes a connection to the MySQL database.
- The script retrieves the user login and password from the POST data. It also checks if the user login is valid by using the FILTER_VALIDATE_EMAIL filter.
- The script then checks if the provided password and its confirmation match and if the password is not empty. If either of these conditions is not met, it sets an error message in the session and redirects the user back to the registration page.
- If the password is valid, the script checks if a user with the same login already exists in the database. It does this by preparing a SELECT statement that retrieves all users with the same login. If the number of rows returned by the statement is greater than 0, it means that the user already exists, and the script sets an error message in the session and redirects the user back to the registration page.
- If the user does not already exist in the database, the script prepares an INSERT statement that inserts the new user into the database. It hashes the provided password using the PASSWORD_BCRYPT algorithm and binds the user login and hashed password to the statement.
- After the INSERT statement is executed, the script checks if there is an error message in the session. If there is, it removes the error message and sets the referrer to the login page.
- Finally, the script closes the database connection and redirects the user to the login page.

## Check Login Page
The `process/checklogin.php` page checks if the provided user login and password are valid and if the user with the same login already exists in the database. If the login process is successful, it redirects the user to the main page of the application.

- The script includes the necessary files: sessions.inc.php and conn.inc.php. The sessions.inc.php file handles user sessions, and conn.inc.php establishes a connection to the MySQL database.
- The script defines two functions: checkDbForTheUser() and checkPassword(). The checkDbForTheUser() function checks if a user with the same login already exists in the database. The checkPassword() function checks if the provided password matches the password stored in the database for the user with the same login.
- The script retrieves the user login and password from the POST data. It also checks if the user login is valid by using the FILTER_VALIDATE_EMAIL filter.
- If the user login is valid, the script calls the checkDbForTheUser() function to check if a user with the same login already exists in the database. If the function returns a non-null value, it means that the user already exists, and the script sets an error message in the session and redirects the user back to the login page.
- If the user does not already exist in the database, the script calls the checkPassword() function to check if the provided password matches the password stored in the database for the user with the same login. If the function returns the index.php page, it means that the password is correct, and the script sets the login session variable to 1 and redirects the user to the main page of the application.
- If the user login is not valid, the script sets an error message in the session and redirects the user back to the login page.
- Finally, the script closes the database connection and redirects the user to the login page.

