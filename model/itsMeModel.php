<?php
GET /cb HTTP/1.1
Host: client.example.org

HTTP/1.1 200 OK
Content-Type: text/html

<script type="text/javascript">
require_once('/path/to/oauth2-server-php/src/OAuth2/Autoloader.php');
OAuth2\Autoloader::register();

$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));
$server = new OAuth2\Server($storage);
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage)); // or any grant type you like!
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();

// First, parse the query string
var params = {}, postBody = location.hash.substring(1),
    regex = /([^&=]+)=([^&]*)/g, m;
while (m = regex.exec(postBody)) {
  params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
}

// And send the token over to the server
var req = new XMLHttpRequest();
// using POST so query isn't logged
req.open('POST', 'https://' + window.location.host +
                 '/catch_response', true);
req.setRequestHeader('Content-Type',
                     'application/x-www-form-urlencoded');

req.onreadystatechange = function (e) {
  if (req.readyState == 4) {
    if (req.status == 200) {
// If the response from the POST is 200 OK, perform a redirect
      window.location = 'https://'
        + window.location.host + '/redirect_after_login'
    }
// if the OAuth response is invalid, generate an error message
    else if (req.status == 400) {
      alert('There was an error processing the token')
    } else {
      alert('Something other than 200 was returned')
    }
  }
};
req.send(postBody);