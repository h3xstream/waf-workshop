# Alternative Syntax Material
<!--  -->



## Alternative Keywords



## Alternative Paths

With modern frameworks and applications, the same information is often to be available at multiple locations. Therefor, if an administrator is blocking a specific path, it might be accessible elsewhere. Framework might have a combination of HTML pages, REST api, WebSocket API and a GraphQL api.

As an example, many cloud hosting provider try to enforce some additional hardening to Wordpress instances. The possible reasons is that is represent the most used applications and because it is also a common target from attacker.
Doing a survey of multiples thousands of Wordpress deployment locations. Most high profile Wordpress websites had attempt to disable the user enumeration but in most case, the enumeration was still possible thanks to lesser known entrypoints.

 - Source: [6 ways to enumerate WordPress Users](https://www.gosecure.net/blog/2021/03/16/6-ways-to-enumerate-wordpress-users/)

## Alternative HTML tags

If developpers have manually chosen a list of HTML tags to forbid. It is likely that they will have forget HTML tags that can be used. The same strategy will apply if we are trying to see the edge case from an HTML sanitizer.

For an exhaustive list of [HTML tags](https://github.com/cure53/DOMPurify/blob/1.0.8/src/tags.js) and [HTML attributes](https://github.com/cure53/DOMPurify/blob/1.0.8/src/attrs.js) refer to the project DOMPurify. This project is actively updated when new elements are added to the standard or when new behavior are found.


