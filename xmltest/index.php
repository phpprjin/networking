<!DOCTYPE html>
<html>
<head>
  <title>XML Parser</title>
</head>
<body>

<h2>XML Parser</h2>

<form method="get" action="processxml.php">
  <label>Enter tag name for search</label>
  <input type="text" name="tag" placeholder="No value for all tags">
  <br>
  <label>Choose XML file</label>
  <select name="xmlfile">
    <option value="showinventory">Inventory xml</option>
    <option selected="selected" value="showconfig">Config xml</option>
  </select>
  <br>
  <br>
  <input type="submit" name="search" value="Search tag" />
</form>
<br>

<textarea readonly=" readonly" cols="80" rows="20">
showconfig.xml


  <?php
    echo file_get_contents("http://localhost/xmltest/showconfig.xml");
  ?>
</textarea>

<textarea  readonly="readonly" cols="80" rows="20" >
Showinventory.xml


  <?php
    echo file_get_contents("http://localhost/xmltest/showinventory.xml");
  ?>
</textarea>

</body>

</html>