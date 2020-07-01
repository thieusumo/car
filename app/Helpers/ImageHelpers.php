<?php 
function uploadImage($file, $folder)
{
    $name = $file->getClientOriginalName();
    $name = str_replace(" ", "-", $name);
    $filename = strtotime('now') .'-'. strtolower($name);

    $pathImage = 'images/'.$folder.'/';
    if (!file_exists(public_path($pathImage)) ) {
        mkdir($pathImage, 0777, true);
    }
    $file->move($pathImage, $filename);

    return $pathImage.$filename;
}
function ok(){
	return 'ok';
}
?>