<?php
$title = '';
$source = '';
$return = '';

if (isset($_POST['title'])) 
{
	$title = $_POST['title'];
}

if (isset($_POST['source'])) 
{
	$source = $_POST['source'];
}

if (isset($_POST['return'])) 
{
	$return = $_POST['return'];
}

echo $title."<br/>";
echo $source."<br/>";
echo $return."<br/>";

$path = "../images/slider/$source/";
$target_dir = $path; //"uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
&& strtolower($imageFileType) != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

			//Add to XML =============
			$xmlsource = $source;
			if($xmlsource == 'wedding'){
				
				$xmlsource = 'weddings';
			}
			
			$path = "../gallerydata/$xmlsource.xml";
			echo $path."<br/>";
			
			$doc = new DOMDocument; 
			$doc->load($path);
			$thedocument = $doc->documentElement;
			$list = $thedocument->getElementsByTagName('title');
			$ids = array();
			foreach ($list as $domElement){
				$attrValue = $domElement->getAttribute('titleid');
				array_push($ids, $attrValue);
			}

			$firstid = $ids[0];
			$nextid = max($ids)+1;

			// XPath-Querys 
			$parent_path = "//images"; 
			$next_path = "//images/image[@imageid='".$firstid."']"; 

			// Find the parent node 
			$xpath = new DomXPath($doc); 

			// Find parent node 
			$parent = $xpath->query($parent_path); 

			// new node will be inserted before this node 
			$next = $xpath->query($next_path); 
			
			// Create the new element 
			$newelementurl = $doc->createElement('url',"images/slider/".$source."/".$_FILES["fileToUpload"]["name"]); 
			$domAttribute = $doc->createAttribute('urlid');
			$domAttribute->value = $nextid;
			$newelementurl->appendChild($domAttribute);
			
			$newelementtitle = $doc->createElement('title',$title); 
			$domAttribute = $doc->createAttribute('titleid');
			$domAttribute->value = $nextid;
			$newelementtitle->appendChild($domAttribute);

			$newelementImage = $doc->createElement('image'); 
			$domAttribute = $doc->createAttribute('imageid');
			$domAttribute->value = $nextid;
			$newelementImage->appendChild($domAttribute);
			$newelementImage->appendChild($newelementurl);
			$newelementImage->appendChild($newelementtitle);
			
			
			// Insert the new element 
			$parent->item(0)->insertBefore($newelementImage, $next->item(0)); 

			$doc->saveXML(); 
			$doc->save($path); // This saves the XML to a file	
			
			
			if($source == 'wedding')
			{
				header('Location: editweddings.php');
			}
			if($source == 'funerals')
			{
				header('Location: editfunerals.php');
			}
			if($source == 'events')
			{
				header('Location: editevents.php');
			}
			if($source == 'corporate')
			{
				header('Location: editcorporate.php');
			}

			
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>