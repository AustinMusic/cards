<?php
class rbe_mediaUtilities {
	
	public function imageTransformations($img,$imgPath, $suffix="",$toWidth,$toHeight,$quality,$target_path="",$mode="resize",$constrain=false){
	    $newNameE = explode(".", $img);
	    $newName = $newNameE[0].$suffix.".".$newNameE[1];


	    //Open the original image.
		if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
			$original = imagecreatefrompng($imgPath.$img);
		}elseif((strcmp($newNameE[1],"gif")==0)||(strcmp($newNameE[1],"GIF")==0)){
			$original = imagecreatefromgif($imgPath.$img);
		}elseif((strcmp($newNameE[1],"bmp")==0)||(strcmp($newNameE[1],"BMP")==0)){
			$original = imagecreatefrombmp ($imgPath.$img);
		}else{
			$original = imagecreatefromjpeg($imgPath.$img);
		}
		
		 
	    list($width, $height, $type, $attr) = getimagesize($imgPath.$img);
	    if($toWidth>$width || $toHeight>$height){
	    	$toWidth = $width;
	    	$toHeight = $height;
	    }
	    if($constrain){
	    	$new_width = $toWidth;
	    	$new_height = floor($height*($toWidth/$width));

	    	switch ($mode){
	    		case "resize":
	    			$toWidth = $new_width;
					$toHeight = $new_height;
    			break;
	    		case "stretch":
	    			$toWidth = $new_width;
					$toHeight = $new_height;
    			break;
	    		case "crop":
	    			$toWidth = $new_width;
	    			if($new_height<$toHeight){
	    				$toHeight = $new_height;
	    			}
    			break;
    			case "resizeKeepProportions":
    			    $ratio = $width/$height;
    			    if($new_height<$toHeight){
    			        while($new_height<$toHeight){
    			            $new_width+=$ratio;
    			            $new_height++;
    			        }
    			    }else{
    			        while($new_height>$toHeight){
    			            $new_width-=$ratio;
    			            $new_height--;
    			        }  
    			    }
    			    
    			    $toWidth = $new_width;
    			    $toHeight = $new_height;
			    break;
	    	}

	    }else{
	    	$xscale=$width/$toWidth;
	    	$yscale=$height/$toHeight;
	    	
	    	//Determine new width and height.
	    	if ($yscale>$xscale){
	    		$new_width = round($width * (1/$yscale));
	    		$new_height = round($height * (1/$yscale));
	    	}else{
	    		$new_width = round($width * (1/$xscale));
	    		$new_height = round($height * (1/$xscale));
	    	}
	    }
	
		//Resample the image.
	    $tempImg = imagecreatetruecolor($toWidth, $toHeight);
		if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
			$transparent = imagecolorallocatealpha($tempImg, 0, 0, 0, 127);
			imagealphablending($tempImg, false);
			imagesavealpha($tempImg, true);
			imagefilledrectangle($tempImg, 0, 0,$new_width, $new_height, $transparent);
		}
		//Create the new file name.
		switch ($mode){
			case "resize":
				imagecopyresampled( $tempImg, $original, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			break;
			case "stretch":
				imagecopyresized ( $tempImg,$original, 0,0, 0, 0, $toWidth ,$toHeight, $width, $height );
			break;
			case "crop":
				imagecopyresampled( $tempImg, $original, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				$tempImg2 = imagecreatetruecolor($toWidth, $toHeight);
				if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
					$transparent = imagecolorallocatealpha($tempImg2, 0, 0, 0, 127);
					imagealphablending($tempImg2, false);
					imagesavealpha($tempImg2, true);
					imagefilledrectangle($tempImg2, 0, 0,$toWidth, $toHeight, $transparent);
				}
				imagecopy ( $tempImg2,$tempImg, 0,0, 0, 0, $toWidth ,$toHeight);
				$tempImg = $tempImg2;
			break;
			case "resizeKeepProportions":
			    imagecopyresampled( $tempImg, $original, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		    break;
		}

		//Save the image.
		if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
			if($quality==100){
				$quality=0;
			}elseif($quality<100 && $quality>=80){
				$quality=2;
			}elseif($quality<80 && $quality>=60){
				$quality=4;
			}elseif($quality<60 && $quality>=40){
				$quality=6;
			}else{
				$quality=9;
			}
			if($target_path!=""){
				imagepng($tempImg, $target_path.$newName, $quality,PNG_ALL_FILTERS);
			}else{
				imagepng($tempImg, $imgPath.$newName, $quality,PNG_ALL_FILTERS);
			}
		}elseif((strcmp($newNameE[1],"gif")==0)||(strcmp($newNameE[1],"GIF")==0)){
			if($target_path!=""){
				imagegif($tempImg,$target_path.$newName);
			}else{
				imagegif($tempImg, $imgPath.$newName);
			}
		}elseif((strcmp($newNameE[1],"bmp")==0)||(strcmp($newNameE[1],"BMP")==0)){
			if($quality==100){
				$quality=false;
			}elseif($quality<100 && $quality>=80){
				$quality=false;
			}elseif($quality<80 && $quality>=60){
				$quality=true;
			}elseif($quality<60 && $quality>=40){
				$quality=true;
			}else{
				$quality=true;
			}
			if($target_path!=""){
				imagebmp($tempImg,$target_path.$newName,quality);
			}else{
				imagebmp($tempImg,$imgPath.$newName,quality);
			}
		}else{
			if($target_path!=""){
				imagejpeg($tempImg,$target_path.$newName,$quality);
			}else{
				imagejpeg($tempImg,$imgPath.$newName,$quality);
			}
		}
	    
	
	   //Clean up.
	    imagedestroy($original);
	    imagedestroy($tempImg);
	    return true;
	}
	
	public function cropImage($sourceImage,$sourcePath,$suffix="",$startX,$startY,$targetWidth,$targetHeight,$quality,$targetPath=""){
	    $newNameE = explode(".", $sourceImage);
	    $newName = $newNameE[0].$suffix.".".$newNameE[1];
	    if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
	        $original = imagecreatefrompng($sourcePath."/".$sourceImage);
	    }elseif((strcmp($newNameE[1],"gif")==0)||(strcmp($newNameE[1],"GIF")==0)){
	        $original = imagecreatefromgif($sourcePath."/".$sourceImage);
	    }else{
	        $original = imagecreatefromjpeg($sourcePath."/".$sourceImage);
	    }
	
	    list($width, $height, $type, $attr) = getimagesize($sourcePath."/".$sourceImage);
	
	    $tempImage = imagecreatetruecolor($targetWidth, $targetHeight);
	    if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
	        $transparent = imagecolorallocatealpha($tempImage, 0, 0, 0, 127);
	        imagealphablending($tempImage, false);
	        imagesavealpha($tempImage, true);
	        imagefilledrectangle($tempImage, 0, 0,$targetWidth, $targetHeight, $transparent);
	    }
	    imagecopy($tempImage,$original,0,0,$startX,$startY,$targetWidth,$targetHeight);
	
	    //Save the image.
	    if((strcmp($newNameE[1],"png")==0)||(strcmp($newNameE[1],"PNG")==0)){
	        if($quality==100){$quality=0;}
	        elseif($quality==80){$quality=2;}
	        elseif($quality==60){$quality=4;}
	        elseif($quality==40){$quality=6;}
	        else{$quality=9;}
	        if($targetPath!=""){
	            imagepng($tempImage, $targetPath."/".$newName, $quality,PNG_ALL_FILTERS);
	        }else{
	            imagepng($tempImage, $sourcePath.$newName, $quality,PNG_ALL_FILTERS);
	        }
	    }elseif((strcmp($newNameE[1],"gif")==0)||(strcmp($newNameE[1],"GIF")==0)){
	        if($targetPath!=""){
	            imagegif($tempImage,$targetPath."/".$newName);
	        }else{
	            imagegif($tempImage, $sourcePath.$newName);
	        }
	    }else{
	        if($targetPath!=""){
	            imagejpeg($tempImage, $targetPath."/".$newName, $quality);
	        }else{
	            imagejpeg($tempImage, $sourcePath.$newName, $quality);
	        }
	    }
	
	    //Clean up.
	    imagedestroy($original);
	    imagedestroy($tempImage);
	    return true;
	}

	
	function __construct() {}
	function __destruct() {}
}

?>