# perusahaan-xyz-study-case
### This application is a study case for a football management company called `Perusahaan XYZ`
**Things to prepare before accessing the application**
1. Change `base_url` item in `config.php` file to match the application url
2. Change `app_base_dir` item in `config.php` file to match the application's base/root directory. *This is used for image uploading purpose*
3. Modify `hostname`, `username`, `password`, and `database` item in `database.php` to connect to the database.
4. *Importing the database*. There are two ways that can be done to get the database schema in this application (**you only need to follow one of the following ways**). First way, you can access the `app_url/setup` and click the database setup steps in that page. Second way, you can import the database sql file from `DB` directory in this repository. *If you choose the second way, there are existing sample data of the application*.

---
**Accessing the application**

You have to log in when accessing the application. The main email and password for accessing the application are `admin@mail.com` and `12345678`. User of this application needs to be logged in to access the application.

---
**Feature:**
- Create, read, update and delete team data
- Create, read, update and delete player data
- Create, read, update and delete position data
- Create, read, update and delete match data
- Insert score for existing match along with the scorers
- View score detail (for a match with available score)
- View upcoming and recent matches in the home page
- Create, read, update, and delete app user (*admin only*)
- Log in and log out
