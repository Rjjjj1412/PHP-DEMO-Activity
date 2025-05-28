<?php
//Odd or Even
$num = readline("Enter a number: ");
if ($num % 2 == 0) {
    echo $num . " is Even\n";
} else {
    echo $num . " is Odd\n";
}

//Odd or Even (Short Circuited Version)
$num = readline("Enter a number: ");
$result = ($num % 2 == 0) ? "Even" : "Odd";
echo "The number is: {$num}\n";

//Function to user for the Prime Number
function isPrime($number) {
    if ($number < 2) {
        return "$number is not prime\n";
    }
    if ($number === 2) {
        return "$number is prime\n";
    }
    if ($number % 2 != 0) {
        return "$number is not prime\n";
    }
    $sqrtNumber = sqrt($number);
    for ($i = 3; $i <= $sqrtNumber; $i += 2) {
        if ($number % $i === 0) {
            return "$number is not prime\n";
        }
    }
    return "$number is prime\n";
}
//Prime Number
$number = readline("Enter a number: ");
if (!is_numeric($number)) {
    echo "Invalid input. Please enter a number.\n";
    exit;
}
$number = (int) $number;
for ($ctr = 2; $ctr <= $number; $ctr++) {
    echo isPrime($ctr);
}

//USING COMPOSERS FOR EXAMPLES
require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;
use Ramsey\Uuid\Uuid;
use Faker\Factory;

//Slugify
$slugify = new Slugify();
echo $slugify->slugify("This is the new sample text.") . "\n";

//Generate UUID
$uuid = Uuid::uuid4();
echo $uuid->toString() . "\n";

//Create Faker instance
$faker = Factory::create(); 
echo $faker->name() . "\n";
echo $faker->email() . "\n";
echo $faker->text() . "\n";