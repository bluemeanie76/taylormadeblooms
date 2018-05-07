<?php
$id = '';
$title = '';
$update = false;
$delete = false;
$source = '';
$return = '';

if (isset($_POST['id'])) 
{
	$id = $_POST['id'];
}

if (isset($_POST['title'])) 
{
	$title = $_POST['title'];
}

if (isset($_POST['update'])) 
{
	$update = true;
}

if (isset($_POST['delete'])) 
{
	$delete = true;
}

if (isset($_POST['source'])) 
{
	$source = $_POST['source'];
}

if (isset($_POST['return'])) 
{
	$return = $_POST['return'];
}

$path = "../gallerydata/$source.xml";

echo "ID: $id<br/>";
echo "Title: $title<br/>";
echo "SOURCE: $source<br/>";
echo "RETURN: $return<br/>";
echo "UPDATE: $update<br/>";
echo "DELETE: $delete<br/>";
echo "PATH: $path<br/>";

$doc = new DOMDocument; 
$doc->load($path);
$thedocument = $doc->documentElement;
  
//UPDATE
if($update)
{
	$list = $thedocument->getElementsByTagName('title');
	$nodeToUpdate = '';

	foreach ($list as $domElement){
  
		$attrValue = $domElement->getAttribute('titleid');
		if ($attrValue ==  $id) {
			$nodeToUpdate = $domElement; 
			$OldTitle = $domElement;
			$newelement = $doc->createElement('title',$title); 
			$domAttribute = $doc->createAttribute('titleid');
			$domAttribute->value = $attrValue;
			$newelement->appendChild($domAttribute);
			$OldTitle->parentNode->replaceChild($newelement, $OldTitle);		
	  }
	}

	if ($nodeToUpdate != null)
	{
		$doc->saveXML(); 
		$doc->save($path);
	}

}
//DELETE
if($delete)
{
	//echo "DELEEETE ME <br/>";
	$list = $thedocument->getElementsByTagName('image');
	$nodeToRemove = '';

	foreach ($list as $domElement){
	  $attrValue = $domElement->getAttribute('imageid');
	  if ($attrValue ==  $id) {
			$nodeToRemove = $domElement;
	  }
	}

	if ($nodeToRemove != null)
	{
		$thedocument->removeChild($nodeToRemove);
		$doc->saveXML(); 
		$doc->save($path);
	}
}

if($source == 'weddings')
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
?>