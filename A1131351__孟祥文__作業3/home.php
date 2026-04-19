<?php
require_once __DIR__ . '/common.php';

$user = requireLogin();
redirect(roleHome($user['role']));

