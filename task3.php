<?php
ob_start();
require('task1.php');
ob_get_clean(); 

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

function getGenderFromName($FIO){
    $data = getPartsFromFullname($FIO);
    $gender = 0;

    if($data === ''){
        return "Неопределенный пол";
    }
    else if(mb_substr($data['patronomyc'], -3) === 'вна' && 
        mb_substr($data['name'], -1) === 'а' && 
        mb_substr($data['surname'], -2) === 'ва'
        )
    {
        $gender -= 1;
    }
    else if(mb_substr($data['patronomyc'], -2) === 'ич' && 
            (mb_substr($data['name'], -1) === 'й' || 
            mb_substr($data['name'], -1) === 'н') && 
            (mb_substr($data['surname'], -1) === 'в' ||
            mb_substr($data['surname'], -2) === 'ин')
            )
    {
        $gender += 1;
    }else{
        return $gender;
    }
    
    $new_gender = $gender <=> 0;

    if($new_gender === 1){
        return "Мужской пол";
    }
    else if($new_gender === -1){
        return "Женский пол";
    }
    else{
        return "Неопределенный пол";
    }
}

echo 'Задание 3 </br>';
echo getGenderFromName('Иванов Иван Иванович');
echo '</br>';
echo getGenderFromName('Степанова Елена Степановна');
echo '</br>';
echo getGenderFromName('');


?>