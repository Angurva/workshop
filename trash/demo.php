<?php


/*$var = '</>&~#"{[(-|è`_\\ç^@à)]=}"*$%ù"!:;,';
$var = htmlspecialchars($var);
echo $var;
$var = '</>&~#"{[(-|è`_\\ç^@à)]=}"*$%ù"!:;,';
$var = htmlentities($var);
echo $var;*/
/*$var = "'<strong>Bonjour / </strong> \n'";
$var = strip_tags($var);
$var = htmlspecialchars($var);
//$var = htmlentities($var);
echo $var;
*/
echo '$_FILES : ';
/*var_dump($_FILES['multi_file']['name'][0]);
var_dump($_FILES['multi_file']['full_path'][0]);
var_dump($_FILES['multi_file']['type'][0]);
var_dump($_FILES['multi_file']['tmp_name'][0]);
var_dump($_FILES['multi_file']['error'][0]);
var_dump($_FILES['multi_file']['size'][0]);

var_dump(count($_FILES['multi_file']['name']));*/
$number = count($_FILES['multi_file']['name']);
$counter = 0;
echo $number;

while ($counter<$number)
{
    $filesArr[] = [
        'name' => $_FILES['multi_file']['name'][$counter] ,
        'full_path' => $_FILES['multi_file']['full_path'][$counter],
        'type' => $_FILES['multi_file']['type'][$counter],
        'tmp_name' => $_FILES['multi_file']['tmp_name'][$counter],
        'error' => $_FILES['multi_file']['error'][$counter],
        'size' => $_FILES['multi_file']['size'][$counter]
    ];
    $counter++;
}
//var_dump($filesArr);



foreach($filesArr as $key=>$file)
{
    var_dump($file['name']);
}


//var_dump($_FILES);

/*
foreach($_FILES['multi_file'] as $key=>$file)
{
    var_dump($file);
    /*var_dump($_FILES['multi_file']['name']);
    var_dump($_FILES['multi_file']['tmp_name']);

}
*/
/*
foreach ($_FILES['multi_file'] as $file)
{
    var_dump($file);
}*/

echo '$_POST : ';
//var_dump($_POST);