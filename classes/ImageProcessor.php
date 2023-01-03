<?php
    class ImageProcessor
    {
        public static function upload($image, $directory = "/uploads", $sizelimit = 1000000, $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']) : string
        {

            //Validate the file type
            if (exif_imagetype($image['tmp_name'] === false)){
                throw new Exception("The file is not an image");
            }

            //validate the file size
            if(getimagesize($image) > $sizelimit){
                throw new Exception("The file is too large");
            }

            //Validate the extension type
            $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExtensions)){
                throw new Exception("File type not allowed");
            }

            $filename = uniqid() . $ext;

            $destination = $directory . '/' . $filename;

            move_uploaded_file($image['tmp_name'], $destination);

            return $destination;
        }
    }
?>