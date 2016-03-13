# Seedstars PHP Challenge
The purpose of this challenge is to understand how you use PHP.

## Console Script
Jenkins (http://jenkins-ci.org/) is a open source continuous integration server.

Create a script, in PHP, that uses Jenkins' API to get a list of jobs and their status from a given jenkins instance. The status for each job should be stored in an sqlite database along with the time for when it was checked.

##Full App
Make an application which stores names and email addresses in a database (SQLite is fine).

a) Has welcome page in http://localhost/
- this page has links to list and create functions
b) Lists all stored names / email address in http://localhost/list
c) Adds a name / email address to the database in http://localhost/add
- should validate input and show errors
Since you’re doing an application in make sure the app does not have major security problems: CSRF, XSS, SQL Injection.

Make reasonable assumptions, state your assumptions, and proceed. Once you have completed the challenge let us know and share your thoughts on the problems/solutions.

Good luck!

##Instructions

Start by cloning this Github project through the following command:
''git clone https://github.com/jcrjaci/Seedstars-PHP-Challenge-.git''

To execute The script, go to script folder and execute the follow comand:
php main.php

Its necessary to install composer, in case that you dont have insall it, you can do it through:
curl -s https://getcomposer.org/installer | php

Over the Web folder run:
composer install

To acess the web application open the follow URL
http://localhost/Web/public 
