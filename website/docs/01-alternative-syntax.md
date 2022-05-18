# Alternative Syntax Material
<!--  -->




## Alternative Paths

With modern frameworks and applications, the same information is often to be available at multiple locations. Therefor, if an administrator is blocking a specific path, it might be accessible elsewhere. Framework might have a combination of HTML pages, REST api, WebSocket API and a GraphQL api.

As an example, many cloud hosting provider try to enforce some additional hardening to Wordpress instances. The possible reasons is that is represent the most used applications and because it is also a common target from attacker.
Doing a survey of multiples thousands of Wordpress deployment locations. Most high profile Wordpress websites had attempt to disable the user enumeration but in most case, the enumeration was still possible thanks to lesser known entrypoints.

Here are four different URL/paths that will return users details including its email.

 - `https://target.blog/wp-json/wp/v2/users`
 - `https://target.blog/?author=1`
 - `https://target.blog/?rest_route=/wp/v2/users`
 - `https://public-api.wordpress.com/rest/v1.1/sites/target.blog/posts`


Source: [6 ways to enumerate WordPress Users](https://www.gosecure.net/blog/2021/03/16/6-ways-to-enumerate-wordpress-users/)

## Alternative HTML Tags

If developpers have manually chosen a list of HTML tags to forbid. It is likely that they will have forget HTML tags that can be used. The same strategy will apply if we are trying to see the edge case from an HTML sanitizer.

For an exhaustive list of [HTML tags](https://github.com/cure53/DOMPurify/blob/1.0.8/src/tags.js) and [HTML attributes](https://github.com/cure53/DOMPurify/blob/1.0.8/src/attrs.js) refer to the project DOMPurify. This project is actively updated when new elements are added to the standard or when new behavior are found.

```xml
<svg/onload=prompt(/OPENBUGBOUNTY/)>
```

Cloudflare XSS Bypass by [Bohdan Korzhynskyi](https://twitter.com/bohdansec)
```html
<video onnull=null onmouseover=confirm(1)>
```


Akamai WAF Bypass (2018) found by [@s0md3v](https://twitter.com/s0md3v/):
```html
<dETAILS
open
onToGgle
=
a=prompt,a() x>
```


## Alternative Keywords

In order to protect against SQL injection, WAF will detect metadata table names. These are unlikely to be pass by a user unless the website is a forum on SQL.
Instead of targeting the DBMS typical metadata tables (`information_schema.tables`, `all_tables`, `sys.sysobjects`), you can use table names that are less commonly known.

When you have a good idea of the language used by the application, you can search for potential statistic table or ORM metadata tables.

MySQL alternatives to `tables` (`information_schema.tables`):

 - `information_schema.partitions`
 - `information_schema.statistics`
 - `information_schema.key_column_usage`
 - `information_schema.table_constraints`
 - `mysql.innodb_table_stats`

Entity Framework 6.0 / .NET specific tables:

 - `dbo.__MigrationHistory`
 - `AspNetUsers`

!!! danger "Entity Framework Core"

     The Entity Framework Core library no longer include the `Model` column which contained the model in a GZIP Hex encoded formated. (Entity Framework 6.0 and below only)


Oracle alternatives to `all_tables`:

 - `ALL_TAB_STATISTICS`
 - `ALL_TAB_STATS_HISTORY`
 - `ALL_TAB_STAT_PREFS`
 - `ALL_TAB_MODIFICATIONS`
 - ...

