<?php
$hash = '$2y$10$hJI95jFrav8rLIBPCc/wJeqovgwHXeXS9/UKtwn7CFhgQrbP7ft6e';
$motdepasse = 'test1234';

if (password_verify($motdepasse, $hash)) {
    echo "Mot de passe VALIDE ✅";
} else {
    echo "Mot de passe INVALIDE ❌";
}
