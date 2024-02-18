<?php declare (strict_types = 1);
/*
* functions utils
*/


function sanitizeString(string $var):string
{
    $var = strip_tags($var);
    $var = htmlspecialchars($var);
    return $var;
}

function resortArray(array $FilesUpload): array
{
    $number = count($FilesUpload['name']);
    $counter = 0;
    echo $number;

    while ($counter<$number)
    {
        $filesArr[] = [
            'name' => $FilesUpload['name'][$counter] ,
            'full_path' => $FilesUpload['full_path'][$counter],
            'type' => $FilesUpload['type'][$counter],
            'tmp_name' => $FilesUpload['tmp_name'][$counter],
            'error' => $FilesUpload['error'][$counter],
            'size' => $FilesUpload['size'][$counter]
        ];
        $counter++;
    }
    return $filesArr;
}