<?php
header("Content-type: text/xml");
?>
<ODMSpec>
<Command>
<Name>show inventory</Name>
</Command>
<OS>ios</OS>
<DataModel>
<Container name="ShowInventory">
<Container name="NAME:" alias = "InventoryEntry" dynamic = "true">

<Property name="NAME:" alias = "ChassisName" distance = "1" length = "1" end-delimiter = "">
</Property>
<Property name="DESCR:" alias = "Description" distance = "1" length = "-1" >
</Property>
<Property name="PID:" alias="PID" distance = "1" length = "5" end-delimiter = "">
</Property>
<Property name="VID:" alias="VID" distance = "1" length = "1" end-delimiter ="">
</Property>
<Property name="SN:" alias="SN" distance = "1" length = "1" end-delimiter = "">
</Property>
</Container>
</Container>
</DataModel>
</ODMSpec> 