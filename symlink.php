<?php 

$targetFolder = __DIR__.'/../storage/app/public';
$linkFolder = __DIR__.'/storage';
symlink($targetFolder,$linkFolder);

echo "success Link";