Transparent Data at rest Encryption steps:
<br>
add to your .ini  //.cnf for mac <br>
[mysqld] <br>
early-plugin-load=keyring_file.dll    // .so for mac   <br>
keyring_file_data=C:\laragon\data\mysql    <br>
plugin_dir="C:/laragon/bin/mysql/MySQL Server 5.7/lib/plugin"    <br>

Add Keyring folder    <br>
Grant modify permission for file and server map    <br>
Restart MySQL    <br>
<br>
<br>
SHOW PLUGINS;                            <br>                                                 

|PLUGIN_NAME   |   PLUGIN_STATUS   | 
|--------------|-------------------|
| keyring_file | ACTIVE            |   <br>




 SHOW VARIABLES;   <br>
 
 |    Variable_name   | Value                                          |
 |--------------------|----------------------------------------------  |
 | keyring_operations | ON                                             |
 | keyring_file_data  | C:/Program Files/MySQL/MySQL Server 8.0/keyring|
 
activate encrypting:<br>
ALTER TABLE table_name ENCRYPTION='Y';<br>

SELECT TABLE_SCHEMA, TABLE_NAME, CREATE_OPTIONS FROM INFORMATION_SCHEMA.TABLES     <br>
       WHERE CREATE_OPTIONS LIKE '%ENCRYPTION%';                                   <br>
       
| TABLE_SCHEMA | TABLE_NAME | CREATE_OPTIONS |
|--------------|------------|----------------|
| test         | t1         | ENCRYPTION="Y" |


