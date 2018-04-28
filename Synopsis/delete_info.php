<?php
// read json file
$data = file_get_contents('inventory.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete
$arr_index = array();
foreach ($json_arr as $key => $value)
{
    if ($value['id'] == $_POST['id'])
    {
        $arr_index[] = $key;
    }
}

// delete data
foreach ($arr_index as $i)
{
    unset($json_arr[$i]);
}

// rebase array
$json_arr = array_values($json_arr);

 //Convert updated array to JSON
 $jsondata = json_encode($json_arr, JSON_PRETTY_PRINT);
 
// encode array to json and save to file
file_put_contents('inventory.json', $jsondata);

?>