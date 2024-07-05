
<?php
// SDK initialization

// Require the Composer autoloader.
require 'imagekit/vendor/autoload.php';

use ImageKit\ImageKit;  

$imageKit = new ImageKit(
    "public_y5FBPMFkydawtgYoOm97ePjBS+Q=",
    "private_rx8zjHXqgkIH7GhSFxTQLIfy+4o=",
    "https://ik.imagekit.io/qngdd2ab6i"
);

function uploadToImageKit($filePath, $fileName) {
    global $imageKit;
    $uploadFile = $imageKit->uploadFiles([
        "file" => fopen($filePath, "r"),
        "fileName" => $fileName
    ]);
    return $uploadFile;
}