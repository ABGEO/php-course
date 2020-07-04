<?php

function hashPassword($plainPassword) {
    $password = hash('sha512', $plainPassword);
    $password = hash('sha256', $password);

    return $password;
}

function checkPassword($plainPassword, $passwordHash) {
    $hash = hashPassword($plainPassword);

    return $hash == $passwordHash;
}
