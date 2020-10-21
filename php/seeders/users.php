<?php
// Seed dummy users into the api for testing purposes
require_once 'Faker/src/autoload.php';



 for($i = 0; $i < 50; $i++){
    $faker = Faker\Factory::create();

    require_once(__DIR__. '/../private/db.php');
    $password = password_hash('password', PASSWORD_DEFAULT);
    $timestamp = strtotime('now');
    $username = uniqid();
    $email = uniqid() . '@gmail.com';
    $query = $db->prepare('INSERT INTO users VALUES (null, "'.$faker->firstName.'", "'.$faker->lastName.'", "'.$username.'", "'.$email.'", "'.$password.'", 11, 19, 1995, '.$timestamp.')');
    
    var_dump($query);
     $query->execute();

 
 }
