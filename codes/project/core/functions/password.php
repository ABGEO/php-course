<?php

function hashPassword($plainPassword) {
    $password = hash('sha512', $plainPassword);
    $password = hash('sha256', $password);

    return $password;
}
