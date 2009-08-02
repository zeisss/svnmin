
    !!! WARNING !!!
    These scripts executes commands and modify files, so NEVER 
    unpack them in a public accessable folder on your system.
    Make sure its protected in some way. To make this working,
    remove the die() line from the config.php.

svnmin
======
This package contains some simple php files for partially managing your subversion installation:

* create-repository.php - Creates a new SVN repository in the repository parent dir.
* svnaccess.php - Modify a file, where the access rights on your repositories are configured
* modify-post-commit.php - Modify the post-commit hooks of all repositories within your svn parent dir.
* htusers.php - Add and remove users to htusers file for repository authorization

These are simple scripts fitting my needs with only a small number of depencies:
* The webserver needs to be able to write to the repositories
* The webserver must be capable of executing svnadmin (Must be on the path)

LICENSE
------
This package is free as-is. Take it and do whatever you like. 

Installation
------------
Installation is easy: 
 0. (Configure Apache to server your repositories and secure them)
 1. Unpack the tarball into a folder accessible by the webserver
 2. Secure the folder e.g. with htaccess
 3. Modify the config.php to fit your needs and remove the die() command at the top

Project home:
-------------
The project is located at [Github][svnmin]
Issues are stored in the project itself using the Ditz issue tracker.
Check it out at [ditz.rubyforge.org][ditz]

Authors 
-------
* ZeissS zeisss(AT_)moinz.de


   [svnmin]: http://www.github.com/zeisss/svnmin "Svnmin at GitHub"
   [ditz]:   http://ditz.rubyforge.org/ "Ditz at Rubyforge"