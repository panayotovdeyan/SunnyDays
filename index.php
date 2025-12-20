<?php
session_start();
define("SunnyDays", true);

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
if (function_exists('show_flash_alert_and_clear')) {
    show_flash_alert_and_clear();
}

include_once 'views/index-html.php';