<?php include("Acara7_3.php"); ?>
<?php
$stefan = new person();
$jimmy = new person;
$stefan->set_name("Stefan Mischook");
$jimmy->set_name("Nick Waddles");
// directly accessing properties in a class is a no-no.
echo "Stefan's full name: ".$stefan->name;
?>