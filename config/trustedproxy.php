<?php

use Illuminate\Http\Request;

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxies
    |--------------------------------------------------------------------------
    |
    | Hier kannst du die IP-Adressen deiner Proxy-Server eintragen.
    | Mit "*" vertraust du allen Proxies (praktisch im Heimnetz oder
    | beim Einsatz von Nginx Proxy Manager).
    |
    | Empfehlung: Für mehr Sicherheit später die konkrete IP deines
    | NPM-Containers eintragen (z. B. "192.168.178.120").
    |
    */

    'proxies' => '85.215.226.9',

    /*
    |--------------------------------------------------------------------------
    | Trusted Headers
    |--------------------------------------------------------------------------
    |
    | Diese Header geben an, welche Informationen Laravel auswertet,
    | wenn die App hinter einem Proxy läuft (Host, Schema, Port, etc.).
    |
    | Normalerweise reicht HEADER_X_FORWARDED_ALL für Setups mit
    | Nginx Proxy Manager vollkommen aus.
    |
    */

    'headers' => Request::HEADER_X_FORWARDED_ALL,

];
