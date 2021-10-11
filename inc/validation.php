<?php

/**
 * @var mixed $error
 */
$error = '';

/**
 * @var mixed $success
 */
$success = "";

/**
 * input string is required
 * @param string $value
 * @return bool
 */
function requiredInput(string $value): bool
{
    $str = trim($value);
    if (strlen($str) > 0) {
        return true;
    }
    return false;
}


/**
 * sanitization string input
 * @param string $value
 * @return string
 */
function sanitizeInputString(string $value): string
{
    $str = trim($value);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    return $str;

}


/**
 * sanitization email input
 * @param string $value
 * @return string
 */
function sanitizeInputEmail(string $value): string
{
    $email = trim($value);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    return $email;

}


/**
 * check minimum length of input value.
 * @param string $value
 * @param int $min
 * @return bool
 */
function minInput(string $value, int $min): bool
{
    if (strlen($value) < $min) {
        return false;
    }
    return true;

}

/**
 * check maximum length of input value.
 * @param string $value
 * @param int $max
 * @return bool
 */
function maxInput(string $value, int $max): bool
{
    if (strlen($value) < $max) {
        return false;
    }
    return true;

}


/**
 * check email is valid.
 * @param string $email
 * @return bool
 */
function validateEmail(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}


/**
 * redirect to selected page.php .
 * @param string $page
 * @return void
 */
function redirect(string $page): void
{
    header("LOCATION: {$page}.php");
}


/**
 * redirect to selected page.php after a few second. 
 * @param string $page
 * @param int $sec
 * @return void
 */
function redirectWait(string $page , int $sec):void
{
    header("Refresh: $sec; url={$page}.php");
}