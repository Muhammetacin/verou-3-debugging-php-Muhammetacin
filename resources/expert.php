<?php

// In strict mode, only a variable of the requested type (like: int of the type declaration) will be accepted, or a TypeError will be thrown.
declare(strict_types=1);

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo "Exercise 1 starts here:";

function new_exercise(int $x)
{
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;
}

// Solution: parameter was not set



new_exercise(2);
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[1];
$monday = $week[0];

echo $monday;

// Solution: arrays are 0-indexed



new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged ! Also very fun";
echo substr($str, 0, 10);

// Solution: double quotes need to be correct, you can't use weird ones :-)



new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it
// Bonus: can you fix it with changing just one character? (hard)

foreach ($week as &$day) {
    $day = substr($day, 0, -3);
}

print_r($week);

// Solution: In order to be able to directly modify array elements within the loop precede $day with &. In that case the value will be assigned by reference.
// https://www.php.net/manual/en/control-structures.foreach.php



new_exercise(5);
// === Exercise 5 ===
// The result should be: "Copyright © <current year> - BeCode"
function copyright(int $year)
{
    return "Copyright &copy; $year - BeCode";
}
//print the copyright
echo copyright(intval(date('Y')));

// Solution: convert date string to int, you need to echo the return value



new_exercise(6);
// === Exercise 6 ===
// The array should be printing every letter of the alphabet (a-z)
// Fix the code so the for loop pushes each letter of the alphabet in the array

$arr = [];
for ($i = 97; $i < 123; $i++) {
    array_push($arr, chr($i));
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alphabetical array

// Another way to solve
// $letter = range('a', 'z');
// print_r($letter);

// Solution: assign ascii code of the letter and use function chr = returns a one-character string



new_exercise(7);
// === Exercise 7 ===
// Have the result of the function say: "Welcome John Smith" or "No access"
// Depending on the given information.
function login(string $email, string $password)
{
    if ($email == 'john@example.be' && $password == 'pocahontas') {
        return 'Welcome John' . ' Smith';
    } else
        return 'No access';
}
/* do not change any code below */
//should greet the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas');
//Should say: no access
echo login('john@example.be', 'dfgidfgdfg');
//Should say: no access
echo login('wrong@example', 'wrong');
/* You can change code again */

// Solution: change || or operation to and && operation, only have 1 return keyword, add else otherwise it gets executed anyway



new_exercise(8);
// === Exercise 8 ===
// Check if the link is containing one of the below parts and respond with the correct message
function isLinkValid(string $link)
{
    $unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
echo isLinkValid('http://www.google.com/hack.pdf');
//invalid link
echo isLinkValid('https://google.com');
//VALID link
echo isLinkValid('http://google.com');
//VALID link
echo isLinkValid('http://google.com/test.txt');

// Solution: echo the return values, change == true to !== false



new_exercise(9);
// === Exercise 9 ===
//Filter the array $areTheseFruits to only contain valid fruits
//do not change the arrays itself
$areTheseFruits = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validFruits = ['apple', 'pear', 'banana', 'cherry', 'tomato'];
//from here on you can change the code
for ($i = 6; $i >= 0; $i--) {
    if (!in_array($areTheseFruits[$i], $validFruits)) {
        unset($areTheseFruits[$i]);
    }
}
var_dump($areTheseFruits); //do not change this

// Solution: after unsetting the range of array gets smaller and the car is never read so it can't be deleted. A workaround is to start from the end of the array.



new_exercise(10);
// === Exercise 10 ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are randomly combined as seen in the code, fix all the bugs whilst keeping the functionality!
// Examples: captain strange, ant widow, iron man, ...
$arr = [];

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randName = $heroes[rand(0, count($heroes) - 1)][rand(0, 10)];

    // $randFirstName = $heroes[0][rand(0, 10)];
    // $randLastName = $heroes[1][rand(0, 10)];
    // array_push($arr, ($randFirstName . $randLastName));
    // echo $arr[rand(0, count($arr))];

    return $randName;
}

function combineNames($str1 = "", $str2 = "")
{
    $params = [$str1, $str2];
    foreach ($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    return implode(" - ", $params);
}

echo "Here is the name: " . combineNames();

// Solution: add ; after $hero_lastnames, switch parameters in implode, add & before $param in foreach loop in combineNames (pass by reference), fix the length of the first array index: 2 -> 1

// === The end ===
// GREAT! Well done!