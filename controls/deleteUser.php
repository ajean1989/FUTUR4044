<?php


declare(strict_types=1);


$DeleteUser = new CRUDUser;

$DeleteUser->deleteUser();

unset($_SESSION['name']);
unset($_SESSION['last_name']);
unset($_SESSION['mail']);
unset($_SESSION['birth']);
unset($_SESSION['admin']);
unset($_SESSION['valid']);

$_SESSION['error'] = ':: Votre compte a été supprimé ::';

header("location: /");
exit();