<?php
$clientStorage  = $entityManager->getRepository('YourNamespace\Entity\OAuthClient');
$userStorage = $entityManager->getRepository('YourNamespace\Entity\OAuthUser');
$accessTokenStorage = $entityManager->getRepository('YourNamespace\Entity\OAuthAccessToken');

// Pass the doctrine storage objects to the OAuth2 server class
$server = new \OAuth2\Server([
    'client_credentials' => $clientStorage,
    'user_credentials'   => $userStorage,
    'access_token'       => $accessTokenStorage,
], [
    'auth_code_lifetime' => 30,
    'refresh_token_lifetime' => 30,
]);

// will be able to handle token requests when "grant_type=client_credentials".
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($clientStorage));
// will be able to handle token requests when "grant_type=password".
$server->addGrantType(new \OAuth2\GrantType\UserCredentials($userStorage));

$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($codeStorage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($refreshStorage));

$server->addGrantType(new \OAuth2\GrantType\AuthorizationCode($authorizationCodeStorage));
$server->addGrantType(new \OAuth2\GrantType\RefreshToken($refreshTokenStorage, [
    // the refresh token grant request will have a "refresh_token" field
    // with a new refresh token on each request
    'always_issue_new_refresh_token' => true,
]));
// handle the request
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();