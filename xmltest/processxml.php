<a href="index.php">Back to Index</a>
<?php

if (isset($_GET['search']) != '') {
	$tag = $_GET['tag'];
	$xmlfile = $_GET['xmlfile'] != '' ? $_GET['xmlfile'].".xml" : 'showconfig.xml';
}
 

if (trim($tag) == '') {

	$xml_str = file_get_contents($xmlfile);
	$xml = new SimpleXMLElement($xml_str);
	$items = $xml->xpath('//*');

	if (empty($items)) {
		$items =  array("No tag found");
	}


	print "<pre>";
	print "<br>";
	print "All Tags <br>";
	print "---------------------<br>";


	//print_r(json_decode(json_encode($items[0]), 1));
	$iterator = json_decode(json_encode($items[0]), 1);
	print_r(walk_recursive_remove($iterator,'unset_null_children'));

// $myarray = $items[0]; //json_decode(json_encode($items[0]), 1);
// $iterator = new RecursiveArrayIterator($myarray);
// iterator_apply($iterator, 'traverseStructure', array($iterator));

	 
	exit;
}

 

 function walk_recursive_remove (array $array, callable $callback) {
    foreach ($array as $k => $v) {
        if (is_array($v)) { 
        	if (empty($v)) {
        		$v['value'] = " -- No value --";
        	}
        	
        	$array[$k] = walk_recursive_remove($v, $callback);
        	 

        }  
    }

    return $array;
}

function unset_null_children($value, $key){
	 
    return empty($value)  ? true: false;
}
?>



$xmlfile =  "http://" . $_SERVER['HTTP_HOST'] . "/xmltest/" . $xmlfile;
 

$ch = curl_init($xmlfile);

 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $xml = curl_exec($ch);
 curl_close($ch);
//print_r($xml);
$param = $tag;
preg_match_all("'<$param>(.*?)</$param>'si", $xml, $match);
print '<pre>';
print "<br>";
print "<br>";	
print "Preg Match";

print "<br>";
print "---------------------<br>";
print "<br>";	
if (empty($match[0])){
  $searchtxt = array("No tag found ")	;
}
else {

foreach ($match[0] as $key => $value) {
  //var_dump(trim($value,"  "));
  if ($val = strip_tags($value)  ==  '') {
  	$searchtxt[0][$key]   = "No Value";
  }
  else {
    $searchtxt[0][$key] =  strip_tags($value);
  }

}
}
print_r($searchtxt);



//Create a document instance
 $dom = new DOMDocument();
 //Load the Book.xml file
 $dom->load($xmlfile); 

$nm = $dom->getElementsByTagName($tag);
//print_r($nm);
$element = '';
if ($nm->length > 0) {
  for ($i=0; $i<=$nm->length-1; $i++) {

    $element[] = ($nm->item($i)->nodeValue) ? $nm->item($i)->nodeValue : "No Value";
  }
}
else {
	$element = array("No tag found");
}


print "<br>";
print "<br>";
print "<br>";
print "Dom parser";
print "<br>";
print "---------------------<br>";
print '<pre>';
print_r($element);


$xml_str = file_get_contents($xmlfile);
$xml = new SimpleXMLElement($xml_str);
$items = $xml->xpath('//' . $tag);

if (empty($items)) {
	$items =  array("No tag found");
}
print "<pre>";
print "<br>";
print " Dom Xpath <br>";
print "---------------------<br>";
print_r($items[0]);