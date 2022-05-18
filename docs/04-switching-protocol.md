# Switching Protocol Material

## WebSocket HRS

WebSocket communication is full-duplex communication that takes place inside a HTTP/1. While typical HTTP/1 messages can be sent in full-duplex, classic HTTP require all messages to have a headers and body section. WebSocket allows lightweight communication along with the control over the Socket with Javascript.


<figure markdown>
![websocket sequence diagram](images/websocket_sequence_diagram.png)
<figcaption>WebSocket handshake</figcaption>
</figure>

### Request Smuggling opportunity

It would not be possible to pass an HTTP/1 request once the WebSocket protocol has been established. Once the upgrade is done the receiving application will see incoming traffic as bytes. (Add note regarding encryption)

It is however possible to initiate an incomplete Upgrade request that would fail. If the proxy has a "naive" WebSocket support implementation, it will not at the server response to evaluate if the upgrade succeeds. Using this request fails, it is now possible to pass an additional request to the server. Since it is not in WebSocket mode, it will process the following byte stream as normal HTTP/1.

### Status code validation

Although not all proxies will validate that the upgrade was successful, the most common proxies such as NGINX will be validating the response based on its status code. For those systems, the attack is only effective if an attacker can force a response code to 101 with initiating an actual WebSocket communication.

Mikhail Egorov describe the scenario were a proxy endpoint would make a request to external systems and return the status code from those exchange. If the attacker can control the destination, he could indeed force the status code to 101.

**References:**

 - [Smuggling HTTP requests over fake WebSocket connection](https://github.com/0ang3el/websocket-smuggle) by 0ang3el



## HTTP/1 Upgrade to HTTP/2 cleartext

HTTP 2 Cleartext, shorten to h2c, is the protocol upgrade a connection from HTTP version 1 to HTTP version 2. The operation is done without closing the TCP socket.

### HTTP 2 Handshake Sequence


<figure markdown>
![h2c sequence diagram](images/h2c_sequence_diagram.png)
<figcaption>HTTP/2 Cleartext handshake</figcaption>
</figure>

### Potential abuses

Just like the technique with the WebSocket upgrade, it is possible to create a request that will not be analyzed by the load balancer. Any special processing such as URL filtering could be bypassed.

It can also be an opportunity for an attacker to bypass a Web Application Firewall. We are going to this scenario in practice in the fourth exercise.

**References:**

 - [h2c Smuggling](https://labs.bishopfox.com/tech-blog/h2c-smuggling-request-smuggling-via-http/2-cleartext-h2c) by Jake Miller (BishopFox)
 - [H2C Smuggling in the Wild](https://blog.assetnote.io/2021/03/18/h2c-smuggling/) by Sean Yeoh (AssetNote)
 - [H2C smuggling proves effective against Azure, Cloudflare Access, and more](https://portswigger.net/daily-swig/h2c-smuggling-proves-effective-against-azure-cloudflare-access-and-more) from DailySwig
