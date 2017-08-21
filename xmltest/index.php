<?php


  $ch = curl_init('http://localhost/xmltest/xmloutput.php');

 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $xml = curl_exec($ch);
 curl_close($ch);
//print_r($xml);
$param = $_GET['tag'];
preg_match_all("'<$param>(.*?)</$param>'si", $xml, $match);
print '<pre>';


if (empty($match[0])){
  Echo "No tag found :" . $param;
}
else {
foreach ($match[0] as $key => $value) {
  //var_dump(trim($value,"  "));
  if ($val = strip_tags($value)  ==  '') {
  $match[0][$key] = "No Value";
  }
  else {
    $match[0][$key] = strip_tags($value);
  }

}
print "Preg Match";
print "<br>";
print "---------------------<br>";
print_r($match[0]);


//Create a document instance
 $dom = new DOMDocument();
 //Load the Book.xml file
 $dom->load( 'http://localhost/xmltest/xmloutput.php' );

$tag = $_GET['tag'];

$nm = $dom->getElementsByTagName($tag);
//print_r($nm);
//$element = array();
if ($nm->length > 0) {
  for ($i=0; $i<=$nm->length-1; $i++) {

    $element[] = ($nm->item($i)->nodeValue) ? $nm->item($i)->nodeValue : "No Value";
  }
}

}
print "<br>";
print "Dom parser";
print "<br>";
print "---------------------<br>";
print '<pre>';
print_r($element);


$xml_str = file_get_contents('http://localhost/xmltest/xmloutput.php');
$xml = new SimpleXMLElement($xml_str);
$items = $xml->xpath('//'. $tag);

print "<pre>";
print "<br>";
print " Dom Xpath <br>";
print "---------------------<br>";
print_r($items);