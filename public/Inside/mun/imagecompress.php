<?php require_once("../../../includes/session.php");?>
<?php require_once("../../../includes/db_connection.php");?>
<?php require_once("../../../includes/functions.php");?>
<?php
$query = "SELECT * FROM ess ORDER BY id DESC";
$result = mysqli_query($conn, $query);
confirm_query($result);
$flag=0;
while ($mun_list = mysqli_fetch_assoc($result)) 
{
	if ($mun_list['picset']==1)
    {                                                                                                                             
        $poster_time = strtotime($mun_list['post_time']);                                                    
        $posterid=$mun_list['post_user'].date("Y-m-d H-i-s", $poster_time);  
        $path="../images/". $posterid .".jpg";                                                                                                    
        //echo '<img src="../images/' . $posterid . '.jpg "class="img-responsive">';
        //list($width, $height) = getimagesize($path);
		
		
        ini_set('memory_limit', '400M');
		$filename = $path;
		list($width, $height) = getimagesize($filename);
		$maxh=550;
		$minh=400;
		$maxw=550;
		$minw=450;
		$or1=$height/$width;
		$minr=$minh/$minw;
		if($height>$maxh)
		{

			$nh=475;
			$nw=($width*475)/$height;
			$thumb = imagecreatetruecolor($nw, $nh);
			$source = imagecreatefromjpeg($filename);
			//unlink("../images/newimages/". $posterid .".jpg");
			//$posterid="d".$posterid;
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
			imagejpeg($thumb,"../images/newimages/". $posterid .".jpg",100);
				// if($or1==$minr)
				// {
				// 	$thumb = imagecreatetruecolor($minw, $minh);
				//     $source = imagecreatefromjpeg($filename);
				//     //unlink("../images/newimages/". $posterid .".jpg");
				//     //$posterid="d".$posterid;
				// 	imagecopyresized($thumb, $source, 0, 0, 0, 0, $minw, $minh, $width, $height);
				// 	imagejpeg($thumb,"../images/newimages/". $posterid .".jpg",100);
				// }
				// else
				// {
				// 	$nh=$minh;
				// 	$nw=$nh/$or1;

				// 	if($nw>$maxw)
				// 	{
				// 		$nw=$minw;
				// 		$nh=$nw/$or1;
				// 	}

				// 	$thumb = imagecreatetruecolor($nw, $nh);
				//     $source = imagecreatefromjpeg($filename);
				//     //unlink("../images/newimages/". $posterid .".jpg");
				//     //$posterid="d".$posterid;
				// 	imagecopyresized($thumb, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
				// 	imagejpeg($thumb,"../images/newimages/". $posterid .".jpg",100);
				// }
		}
		else
		{
			$thumb = imagecreatetruecolor($nw, $nh);
			$source = imagecreatefromjpeg($filename);
			$thumb = imagecreatetruecolor($width, $height);
				    $source = imagecreatefromjpeg($filename);
				    //unlink("../images/newimages/". $posterid .".jpg");
				    //$posterid="d".$posterid;
					imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $width, $height);
					imagejpeg($thumb,"../images/newimages/". $posterid .".jpg",100);
		}
		// if($width>500)
		// {
		//  $newwidth =500;
		//  $newheight = ($height * 500)/$width;
	 //    }
	 //    else
	 //    {
	 //    	$newwidth = $width;
		//     $newheight = $height;
	 //    }
		// $thumb = imagecreatetruecolor($newwidth, $newheight);
		// $source = imagecreatefromjpeg($filename);
		// imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	 // 	imagejpeg($thumb,"../images/newimages/". $posterid .".jpg",100);
	 	//$thumb->writeImage("..images/newimages/". $posterid .".jpg"); 
		//return destination file
		//unlink("../images/newimages". $posterid .".jpg");
		imagedestroy($source);
		imagedestroy($thumb);


		// $image = new Imagick($path);
		// $geo=$image->getImageGeometry(); 
		// $width=$geo['width']; 
		// $height=$geo['height'];
		// $h=500*$height/$width;
		// $w=500;
		// $image->resizeImage( $w, $h , Imagick::FILTER_LANCZOS, 1, TRUE);
		 //$image->writeImage("..images/newimages/". $posterid .".jpg "); 
		echo "done";                                                               
    } 
}
?>