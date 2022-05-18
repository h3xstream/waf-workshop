---
theme: gaia
_class: lead
backgroundColor: #fff
backgroundImage: url('images/hero-background.svg')
marp: true
---

![bg left:40% 80%](images/nsec_logo.png)

# **Web Application Firewall Workshop**

Presented by Philippe Arteau

**NorthSec 2022**

---

# About Me

 - Security Engineer at ServiceNow
 - Interested in web application security, automation, crypto, ...
 - Open-source developer
    - **Find Security Bugs**: Static Analysis for Java applications
    - **Burp and ZAP Plugins**: (Retire.js, CSP Auditor, Reissue Request Scripter, …)

---

# Agenda

 1. What is a WAF?
 2. Alternative Syntax
 3. Encoding
 4. SQL Syntax
 5. Switching Protocol
 6. Request Smuggling

---

# Workshop

 - Repository: https://github.com/h3xstream/waf-workshop
   - Slides are linked in the **README.md** file.

--- 
![bg left:35%](images/wall-21534_1920.jpg)
<!-- _class: lead -->
# What is a WAF?


---

# Definition

- The purpose of the Web Application Firewall is to filters, monitors, and blocks HTTP traffic.

- HTTP traffic can incoming and/or outgoing 

![](images/proxy.png)

---

# Vendors

![](images/vendors.png)

---
![bg left:35%](images/railroad-2100353_1920.jpg)
<!-- _class: lead -->
# Alternative Syntax

---

# Alternative Paths

What is the path to Wordpress's users endpoint?

 - https://target.blog/wp-json/wp/v2/users
 - https://target.blog/?author=1
 - https://target.blog/?rest_route=/wp/v2/users
 - https://public-api.wordpress.com/rest/v1.1/sites/target.blog/posts

*Source: [6 ways to enumerate WordPress Users](https://www.gosecure.net/blog/2021/03/16/6-ways-to-enumerate-wordpress-users/)*

---

# Alternative HTML Tags

```xml
<svg/onload=prompt(/OPENBUGBOUNTY/)>
```

```html
<video onnull=null onmouseover=confirm(1)>
```
*Source: Cloudflare XSS Bypass by [Bohdan Korzhynskyi](https://twitter.com/bohdansec)*

```html
<dETAILS open onToGgle=a=prompt,a() x>
```
*Source: Akamai WAF Bypass (2018) found by [@s0md3v](https://twitter.com/s0md3v/)*

---

# Alternative Keywords

Instead of `information_schema.tables`, `all_tables`, `sys.sysobjects` ...

Alternatives table names:
 - `information_schema.table_constraints`
 - `mysql.innodb_table_stats`
 - `dbo.__MigrationHistory`
 - `ALL_TAB_STATISTICS`




---
![bg left:35%](images/letters-1834501_1920.jpg)
<!-- _class: lead -->
# Encoding


---

# Case Mapping


TODO

---

# URL Encoding

TODO


---

# HTML/XSS specific

Depending on the context, different encoding can be used.

| **Encoding Type** | **<** |
| --- | --- |
| Named XML/HTML entities | `&lt;` |
| Hex XML/HTML entities | `&x3C;` / `&#60;` |
| Slash escaped | `\x3C` , `\074`, `\74` |
| String.fromCharCode |`String.fromCharCode(74)` |

---

### Unicode

Unicode is not the only way to encode characters

• UTF-7 (`+ADw-script+AD4-alert(123)+ADw-+AC8-script+AD4-`) ⚠️
• UTF-16LE (`00 3c 00 62 00 6f 00 6f 00 6b`)
• UTF-16BE
• UTF-32…

⚠️: No longer supported by many browsers and frameworks.

More info: [Unicode vulnerabilities that could byͥte you](https://gosecure.github.io/presentations/2021-02-unicode-owasp-toronto/philippe_arteau_owasp_unicode_v4.pdf)

---

### Unicode Normalization

| Character | Code point |
| -- | --------- | 
| ＜ | (U+FF1C) |
| <  | (U+003C) |

SQL query:
```sql
INSERT INTO ContentTable VALUES (…,'＜img src=…')
```

Content when fetch:
```xml
<img src=x onerror=prompt(1)>
```

---

![bg left:35%](images/wheel-2137043_1920.jpg)
<!-- _class: lead -->
# Switching Protocol

---

## WebSocket

WebSocket handshake

![websocket sequence diagram](images/websocket_sequence_diagram.png)


---

## WebSocket Passthrough

In order to work:

 - You need to either:
    - Control the status code of ONE page
    - Deploy a custom application at a given path
 - Proxy must honors 101 response
 - WAF does not instpect WebSocket communication

---

## HTTP/2 Cleartext

WebSocket handshake

![h2c sequence diagram](images/h2c_sequence_diagram.png)


---

## HTTP/2 Cleartext Passthrough

In order to work:

 - The backend application is supporting H2C
 - Proxy must honors 101 response
 - WAF does not look at HTTP/2 Cleartext requests.

---

![bg left:35%](images/container-789488_1920.jpg)
<!-- _class: lead -->
# Request Smuggling

---
![bg left:35%](images/glasses-1052010_1920.jpg)
<!-- _class: lead -->
## Conclusion

---

## Conclusion

 - Think about transformation
    - Encoding, Replacement
 - HTTP protocol support
    - Application vs Proxy
 - WAF are no silver bullet
    - Using WAF is not bad either! (Additional safety)

---

![bg right:35%](images/race-92193_1920.jpg)
# The End !

## Slides

 - Slides + Exercises: https://github.com/h3xstream/waf-workshop

## Social

 - Twitter [@h3xstream](https://twitter.com/)
 - Website [https://blog.h3xstream.com](https://blog.h3xstream.com/)