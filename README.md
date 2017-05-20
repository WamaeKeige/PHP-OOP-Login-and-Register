OOP PHP Login/Register System
===============================

Walking through the OOP Login/Register System developed by phpacademy on YouTube.

[Video Playlist](http://www.youtube.com/playlist?list=PLfdtiltiRHWF5Rhuk7k4UAU1_yLAZzhWc)

> An object oriented authentication system including the ability to register a user, log in and includes features like validation, remember me, user profiles, CSRF protection, secure password salting and various helper classes to make working with sessions, cookies, input and configuration easier.

Setting Up the Database for this project
======================================

DB's Tables needed

* Users
* Groups
* Sessions

Users
----------
7-columns

* id - int - primary - auto-inc
* username - varchar - 20
* password - varchar - 65 (hash)
* salt - varchar - 32
* name - name - 50 
* date - datetime
* group - int

Groups
------------
3-columns 

* id - int - primary - auto-inc  
* name - varchar - 20  
* permissions - text (json) 

#### Group Data ####

* id=1 / name= Standard user / permissions=
* id=2 / name= Administrator / permissions= {"admin": 1} 


Sessions (user_sessions)
--------------
3-columns

* id - int - primary - auto-inc
* user_id - int
* hash - varchar - 50
