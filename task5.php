<?php
ob_start();
require('task3.php');
ob_get_clean();

$persons = [
    ['fullname' => 'Иванов Иван Иванович'],
    ['fullname' => 'Степанова Александра Степановна'],
    ['fullname' => 'Пащенко Владимир Александрович'],
    ['fullname' => 'Громов Александр Иванович'],
    ['fullname' => 'Славин Семён Сергеевич'],
    ['fullname' => 'Цой Владимир Антонович'],
    ['fullname' => 'Быстрая Юлия Сергеевна'],
    ['fullname' => 'Шматко Антонина Сергеевна'],
    ['fullname' => 'аль-Хорезми Мухаммад ибн-Муса'],
    ['fullname' => 'Бардо Жаклин Фёдоровна'],
    ['fullname' => 'Степанова Елена Степановна'],
];

function getPerfectPartner($surname, $name, $patronomyc, $arr){
    $fullname = mb_convert_case(getPartsFromFullname($surname, $name, $patronomyc), MB_CASE_TITLE_SIMPLE);

    $gender = getGenderFromName($fullname);

    do {
        $randomPerson = $arr[array_rand($arr)];
        $randomGender = getGenderFromName($randomPerson['fullname']);
    } while ($gender === $randomGender || $randomGender === 0);

    $partner_1 = getShortName($fullname);
    $partner_2 = getShortName($randomPerson['fullname']);

    $percent = round(mt_rand(5000, 10000) / 100, 2);

    return "$partner_1 + $partner_2 =</br>" .
            "&#9825; Идеально на {$percent}% &#9825;";

}

function getShortName($FIO){
    $person = getFullnameFromParts($FIO);

    return $person['name'] . ' ' . mb_substr($person['surname'], 0, 1) . '.';
}

echo getPerfectPartner('СтеПаноВа', 'ЕлЕна', 'СтеПАНОВна', $persons);
?>