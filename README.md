## README ##

This is an implementation of the "Mate1 Stickies Problem"

### Live Demo ###

For a short time, the MySQL-backend-enabled version will be hosted at:
http://stickers.popculturelab.ca/

### Implementation Notes ###

#### Rich Text ####
This implementation features a rich text editor that includes at least the following rich formats:

- Bold (ctrl+b / command+b)
- Italic (ctrl+i / command+i)
- Underline (ctrl+u / command+u)

#### Responsive Flow ####

The notes can be dragged around, but don't get attached to their location.

To simplify "getting to the information", all notes are automatically flowed when:

- adding a new note
- resizing the browser window

#### Simplification of "real time updates" ####

To simplify the tasks due the time constraints, the following were taken for granted:

- Position does not matter, and is never saved.
- Ordering of the notes also does not matter, they are returned in whatever order the database likes.
- Updates are not at all "real time + live", they are simply "updated on page refresh".
  - Conflicts are expected, and there will likely be failure if A
    tries to update a note that B deleted.

### Installing ###
To get this up and running locally, most of the work is done in the ```/Config/install.sh``` script.  It is assumed that a LAMP stack has already been installed.

A MySQL database and table called *'stickers'* will be needed for the MySQL-enabled version. ```/Config/Schema/stickers.sql``` has the schema for that table.

**NOTE:** The "v1" edition doesn't really care about MySQL, but it is expected that a MySQL database has been created anyways. Any errors displayed resulting from not having a Database in place are assumed to be outside the scope of this test's interest.

For more details about configuring a CakePHP application, see:
http://book.cakephp.org/2.0/en/development/configuration.html

### Purpose ###
The test makes sure the candidate has strong skills in the following:

- Front end development (HTML, CSS, JS, UX design).
- Back end development (Server side programming, basic database development).
- Application organization and internal API design.

Although all three aspects will be evaluated, the front end part is by far the most important in the context of this hire, followed by application organization and internal API design. The candidate should thus manage his or her time and effort in order to deliver the best possible level of polish according to these priorities.

### Description of the Application ###

You need to write a basic sticky note application. The application allows you to create a note, give it a color, a timestamp, drag it around and to add text to it. Once you're done with a note you can delete it. The application needs to be multi­user and needs to keep the state of your notes stored for later retrieval. The application will have 2 different implementations, a front­end only implementation and an implementation with back­end support.

#### Front End Only Implementation ####
The first implementation of the notes application needs to work on the front end only. It should work 100% as an offline application that stores all its data locally. No server interaction is available in this version of the application (for saving and loading notes). When the user writes notes and closes their browser they should be able to read their notes the next time they open their browser and load the application.

#### Back End Implementation ####

This version of the application is the same as the front end only version except it saves all data in the database on the server side. If multiple users have the application open they will all see a shared board of all
and when a sticky note changes they must see the changes happen on their board as well. There's no need to worry about ownership or note locking.

### Technologies Used ###

Any library can be used on the client or server side to help get the task done keeping in mind that the application needs to work on all browsers (iPhone / Android friendliness is a plus) and the back end code needs to reside on a *nix (Linux is preferred) operating system using a MySQL database.

### Methodology and Results Submission ###
The candidate must version his work using Git, as if it was a real enterprise project. Commits should be scoped appropriately (by feature developed, bug fixed, etc.) and contain relevant messages. The end result must be submitted to Mate1 by pushing it in a GitHub repo.

The project should work out of the box or include a setup script if necessary. A concise read me should also be provided to explain how to get the project up and running, as well as to list which features were implemented (especially if you came up with creative ideas that were not explicitly mentioned in the specs).

