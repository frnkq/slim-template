<?php
namespace Helpers;

use Helpers\AppConfig as Config;
use Helpers\FilesHelper as Files;
class ImagesHelper
{
    public static function SaveImageFromRequest($request, $path, $bkpPath, $newFilename)
    {
        if(!isset($request->getUploadedFiles()["image"]))
            return null;

        $image = self::ValidateImage($request->getUploadedFiles()["image"]);

        if(is_null($image))
            return null;

        $newFilename .= Files::GetExtension($image->getClientFilename());
        $destination = Files::GetPath($path, $newFilename);

        //choose if watermark or not
        $saved = self::SaveImage($image, $path, $bkpPath, $destination, true);
        if(!$saved)
            return null;

        return $newFilename;
    }

    public static function SaveImage($image, $path, $bkpPath, $newPath, $withWatermark = false)
    {
        if($withWatermark)
        {
            $image = self::WatermarkImage($image);
        }

        try
        {
            $filename = Files::GetFilename($newPath);

            //check if file exists in any format -jpg, png, etc-
            //checks for any file named >= the destination filename
            foreach (glob($path."/".$filename."*") as $file)
            {
                $existingFilename = Files::GetFilename($file);

                if($filename == $existingFilename)
                {
                    $newFilename = $filename."_".date('Ymd_His');
                    $newFilename = $newFilename.Files::GetExtension($file);
                   rename($file, Files::GetPath($bkpPath, $newFilename )
                   );

                }
            }

            $image->moveTo($newPath);
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
    }

    public static function ValidateImage($image)
    {
        $validatedImage = null;
        $type = $image->getClientMediaType();
        $size = $image->getSize();
        $extension = Files::GetExtension($image->getClientFilename());

        if(
            ($size <= Config::$imageConstraints["size"])  &&
            (in_array($type, Config::$imageConstraints["types"])) &&
            (in_array($extension, Config::$imageConstraints["extensions"]))
        )
        {
            $validatedImage = $image;
        }

        return $validatedImage;
    }

    public static function WatermarkImage($image)
    {
        return $image;
    }
}
