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

Sessions (user_sessions)
--------------
3-columns

* id - int - primary - auto-inc
* user_id - int
* hash - varchar - 50


*** Group Data ***

* id=1 / name= Standard user / permissions=
* id=2 / name= Administrator / permissions= {"admin": 1}