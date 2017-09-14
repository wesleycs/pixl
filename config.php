<?php 
require_once('vendor/autoload.php');

$stripe = array(
	"secret_key"		=> "sk_test_4DYsBr5tVTactZUzYKbNpxD3",
	"publishable_key"	=> "pk_test_UzAUGDJtNnnnC19g4ZzMcVzF"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?> 
