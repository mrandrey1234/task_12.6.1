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


function getGenderDescription($arr){
    $all_person = count($arr);
    $male_count = 0;
    $female_count = 0;
    $unknown_count = 0;

    foreach($arr as $person){
        $gender = getGenderFromName($person['fullname']);

        if($gender === 1){
            $male_count++;
        }
        else if($gender === -1){
            $female_count++;
        }
        else{
            $unknown_count++;
        }
    }

    $male_percent = round(($male_count / $all_person) * 100, 1);
    $female_percent = round(($female_count / $all_person) * 100, 1);
    $unknown_percent = round(($unknown_count / $all_person) * 100, 1);

    return "Гендерный состав аудитории:</br>" .
            "---------------------------</br>" .
            "Мужчины - {$male_percent}%</br>" .
            "Женщины - {$female_percent}%</br>" .
            "Не удалось определить - {$unknown_percent}%";
}

echo getGenderDescription($persons);
?>