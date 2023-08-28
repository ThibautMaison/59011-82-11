<?php
$tab2 = ["un" => 1 , "deux" => 2 , "trois" => 3 , "quatre" => 4 ];

$key = array_search(1, $tab2);
echo $key;


shuffle($tab2);
foreach ($tab2 as $key => $value) {
    echo $value;
}



