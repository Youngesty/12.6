<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

echo '<br><hr>';

/*Разбиение и объединение ФИО*/

$surname = 'Иванов';
$name = 'Иван';
$partronymic = 'Иванович';
function getFullnameFromParts($surname,$name,$patronymic){
    return($surname.' '.$name.' '.$patronymic);
};
print_r (getFullnameFromParts($surname,$name,$patronymic));

echo '<br><hr>';

$part = "Иванов Иван Иванович";
function getPartsFromFullname($part){
    return array_combine(['surname','name','patronymic'],
     explode(' ',$part));
}
print_r(getPartsFromFullname($part));

/*Сокращение ФИО*/

$partName = 'Иванов Иван Иванович';
echo '<br><hr>';
 function getShortName($partName){
$fio = explode(' ', $partName);
 
echo $fio[0] . ' ' . substr($fio[1],0,2) . '.';
 };
 print_r(getShortName($partName));

 echo '<br><hr>';

/*Определения пола по ФИО*/

 function getGenderFromName($full) {
    $seporated = getPartsFromFullname($full);
    $gender = 0;

    if (mb_substr($seporated["surname"],-2,2) == "ва") {
        $gender = -1;
    } elseif (mb_substr($seporated["surname"],-1,1) == "в"){
        $gender = 1;
    } else {
        $gender = 0;
    }

    $genderName = mb_substr($seporated["name"],-1,1);

    if ($genderName == "а"){
        $gender = -1;
    } elseif ($genderName == "й" || $genderName == "н"){
        $gender = 1;
    } else {
        $gender = 0;
    }

    if (mb_substr($seporated["patronomyc"],-3,3) == "вна"){
        $gender = -1;
    } elseif (mb_substr($seporated["patronomyc"],-2,2) == "ич"){
        $gender = 1;
    } else {
        $gender = 0;
    }
    
    if (($gender <=> 0) === 1){
        echo "Male";
    } elseif (($gender <=> 0) === -1){
        echo "Woman";
    } else {
        echo "Undefined";
    }
}
print_r(getGenderFromName($full));

/*Определение возрастно-полового состава*/

/*function getGenderDescription($persons_array) {
    $arr_man = array_filter($persons_array, function($person) {
    return (getGenderFromName($person['fullname']) == 1);
    });
    $arr_girl = array_filter($persons_array, function($person) {
    return (getGenderFromName($person['fullname']) == -1);
    });
    $arr_undefined = array_filter($persons_array, function($person) {
    return (getGenderFromName($person['fullname']) == 0);
    });
    $percents_man = round(count($arr_man) / count($persons_array) * 100, 1);
    $percents_girl = round(count($arr_girl) / count($persons_array) * 100, 1);
    $percents_undefined = round(count($arr_undefined) / count($persons_array) * 100, 1);
    $output_inform = <<<HEREDOCTEXT
    Гендерный состав аудитории:
    -
    Мужчины - $percents_man %
    Женщины - $percents_girl %
    Неопределено - $percents_undefined %
HEREDOCTEXT;
    echo $output_inform;
}
print_r(getGenderDescription($persons_array));*/
?>