<?php

/**
 * Class FixJPEGOrientationImageExtension
 */
class FixJPEGOrientationImageExtension extends DataExtension {

	public function onAfterUpload() {

        //Get the full path to the image file
        $imagePath = $this->owner->getFullPath();
        if(!file_exists($imagePath)) return;


        //Check the extension of the image to make sure we are dealing with a JPEG file
        //We do not need to process PNG images - they do not contain Exchangeable image file format (Exif) data
        $imageFileExt = strtolower(File::get_file_extension($imagePath));
        if(!in_array($imageFileExt, array('jpeg', 'jpg'))) return;


        //Read the JPEG image Exif data to get the Orientation value
        $exif = exif_read_data($imagePath);
        if(empty($exif['Orientation'])) return;


        //Create a new image from file
        $source = @imagecreatefromjpeg($imagePath);
        if(!$source) return;

        //Modify according to Orientation
        //Replace JPEG at source, thus no other complexities regarding renaming, etc.
        //Note: Replacing an image this way strips any Exif data from the image
        switch ($exif['Orientation']) {
            case 3 :
                $modifiedImage = imagerotate($source, 180, 0);
                imagejpeg($modifiedImage, $imagePath, 100);  //save output to file system at full quality
                break;
            case 6 :
                $modifiedImage = imagerotate($source, -90, 0);
                imagejpeg($modifiedImage, $imagePath, 100);  //save output to file system at full quality
                break;
            case 8 :
                $modifiedImage = imagerotate($source, 90, 0);
                imagejpeg($modifiedImage, $imagePath, 100);  //save output to file system at full quality
                break;
        }


        //Delete any cached formatted versions of the image.
        $this->owner->deleteFormattedImages();
		
	}

}