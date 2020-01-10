Transparent Data at rest Encryption steps:

add to your .ini  //.cnf for mac
[mysqld]
early-plugin-load=keyring_file.dll    // .so for mac
keyring_file_data=C:\laragon\data\mysql
plugin_dir="C:/laragon/bin/mysql/MySQL Server 5.7/lib/plugin"

Add Keyring folder
Grant modify permission for file and server map
Restart MySQL


SHOW PLUGINS;                    SHOW VARIABLES;                                                           
+--------------+---------------+ +--------------------+------------------------------------------------+ 
| PLUGIN_NAME  | PLUGIN_STATUS | |    Variable_name   | Value                                          |
+--------------+---------------+ +--------------------+----------------------------------------------  +  
| keyring_file | ACTIVE        | | keyring_file_data  | C:/Program Files/MySQL/MySQL Server 8.0/keyring|
+--------------+---------------+ | keyring_operations | ON                                             |

activate encrypting:
ALTER TABLE table_name ENCRYPTION='Y';

SELECT TABLE_SCHEMA, TABLE_NAME, CREATE_OPTIONS FROM INFORMATION_SCHEMA.TABLES
       WHERE CREATE_OPTIONS LIKE '%ENCRYPTION%';
+--------------+------------+----------------+
| TABLE_SCHEMA | TABLE_NAME | CREATE_OPTIONS |
+--------------+------------+----------------+
| test         | t1         | ENCRYPTION="Y" |
+--------------+------------+----------------+

