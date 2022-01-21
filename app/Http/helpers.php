<?php

function setActiveRoute($name) {
    return request()->routeIs($name) ? 'active' : '';
}

function isSuperAdmin( $user) {
    if ($user->email === env('SUPER_ADMIN_EMAIL'))
        return true;
}
