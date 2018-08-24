# moodleinherittheme
Example of inherit settings.php and lib.php (functions) from parent theme

We've reached a conclusion and development funtional
on this case to inherit these files. 
We don't know if is this the best way to do but works

The situation is the following:

We have two themes (parent and child theme). Both of them have the same settings from settings.php and some functions from lib.php are equals.

Moodle Themes can inherit js, styles ... but in settings.php (as far as I know) it does not.

This is why we've developed a way to solve this problem. 

Settings.php
Files: 

- Parent
  - classes/settings_parent.php.

  - settings.php

- Child
  - classes/settings_child.php. 

  - settings.php


Parent
We've created a class 'settings parent' with a function 'settings' where we've got the settings of 'Parent' theme. 

We've set 'theme_name' property where we get theme name and use it where we need it.

Code: parent/classes/settings_parent.php



Later, in settings.php, we've use the settings_parent class by sending the name of the theme and calling the settings function.

Code: parent/settings.php



Child
And on the part of child theme, in settings_child.php, we've created settings_child class by extending from settings_parent for get parent settings. (We need import settings_parent file from parent theme for extend settings_parent)

If we want, we can add extra settings for child theme.

Code: child/classes/settings_child.php



By last, we've use the settings_child class by sending the name of the theme and calling the settings function.

Code: child/settings.php



Lib.php

Files: 

- Parent
  - lib.php

- Child
  - lib.php



Parent
Code: parent/lib.php



Child
In lib.php, we've imported the lib from parent theme and we've created the function we want to inherit from parent with the name of child theme. 
Inside the function, we've called the function and added we want in our child theme.
Code: child/lib.php


by [@karucida](https://github.com/karucida "karucida") && [@jorgehuete](https://github.com/jorgehuete "jorgehuete")
