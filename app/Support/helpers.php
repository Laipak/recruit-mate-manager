<?php 

function get_settings($key = null)
{
	$settings = file_get_contents(public_path().'/settings.txt'); 
    $datas = unserialize($settings);
    
    if ($key && array_has($datas, $key)) {
    	return $datas[$key];
    } else {
		return $datas;    	
    }
}

function set_setting($key, $value)
{
	$settings = file_get_contents(public_path().'/settings.txt'); 
    $datas = unserialize($settings); 
    
    if (array_has($datas, $key)) {
    	$datas[$key] = $value;
    } 
             
    $fp = fopen(public_path().'/settings.txt', 'w'); 
    fwrite($fp, serialize($datas));

    return $datas;
}