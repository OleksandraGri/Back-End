<?php
require_once 'Human.php';
require_once 'Student.php';
require_once 'Programmer.php';

$student = new Student(170, 65, 20, "Київський університет", 2);

echo "Студент: " . $student->getUniversity() . ", Курс: " . $student->getCourse() . "<br>";
$student->promoteToNextYear();
echo "Після переведення на курс: " . $student->getCourse() . "<br>";

$programmer = new Programmer(180, 75, 28, ["PHP", "JavaScript"], 5);

echo "Програміст: " . implode(", ", $programmer->getLanguages()) . "<br>";
echo "Досвід роботи: " . $programmer->getExperience() . " років<br>";
$programmer->addLanguage("Python");
echo "Програміст тепер знає: " . implode(", ", $programmer->getLanguages()) . "<br>";

$student->setHeight(172);
$student->setWeight(68);
echo "Студент після зміни: Зріст - " . $student->getHeight() . " см, Вага - " . $student->getWeight() . " кг<br>";

$programmer->setHeight(182);
$programmer->setWeight(78);
echo "Програміст після зміни: Зріст - " . $programmer->getHeight() . " см, Вага - " . $programmer->getWeight() . " кг<br>";

$student = new Student(170, 65, 20, "Київський університет", 2);
$student->birthChild();

$programmer = new Programmer(180, 75, 28, ["PHP", "JavaScript"], 5);
$programmer->birthChild();

$student = new Student(170, 65, 20, "Київський університет", 2);
$student->cleanRoom();
$student->cleanKitchen();

$programmer = new Programmer(180, 75, 28, ["PHP", "JavaScript"], 5);
$programmer->cleanRoom();
$programmer->cleanKitchen();
?>
