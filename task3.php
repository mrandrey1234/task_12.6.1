<?php
ob_start();
require('task1.php');
ob_get_clean(); 

function getGenderFromName($FIO){
    $data = getFullnameFromParts($FIO);
    $gender = 0;

    if($data === ''){
        return 0;
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
    
    return $gender <=> 0;
}

echo 'Задание 3 </br>';
echo getGenderFromName('Иванов Иван Иванович');
echo '</br>';
echo getGenderFromName('Степанова Елена Степановна');
echo '</br>';
echo getGenderFromName('');


?>