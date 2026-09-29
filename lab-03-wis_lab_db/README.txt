WEB INFORMATION SYSTEMS - LAB 04
PHP + MySQL + Bootstrap 5

Files:
- create_database.php
- create_table.php
- insert_student.php

How to run:
1. Put this folder inside XAMPP's htdocs:
   C:\xampp\htdocs\wis_lab_db\

2. Start Apache and MySQL in XAMPP.

3. Open:
   http://localhost/wis_lab_db/create_database.php

4. Enter:
   wis_lab
   Then click "Create Database".

5. Open:
   http://localhost/wis_lab_db/create_table.php
   The students table will be created.

6. Open:
   http://localhost/wis_lab_db/insert_student.php

7. Insert at least these three records through the web form:
   Ahmad Rahimi | ahmad@example.com | Information Systems
   Laila Noori | laila@example.com | Computer Science
   Farid Hamidi | farid@example.com | Software Engineering

8. Verify the records in:
   phpMyAdmin -> wis_lab -> students -> Browse

Notes:
- MySQLi Object-Oriented syntax is used.
- Bootstrap 5 is used for the interface.
- The insertion uses a prepared statement with prepare(), bind_param(), and execute().
