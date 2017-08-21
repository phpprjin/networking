<?php
header("Content-type: text/xml");
?>
<Device-Configuration>
<upgrade><fpd><auto/></fpd></upgrade>
<version><Param>12.4</Param></version>
<service><timestamps><debug><datetime><msec/></datetime></debug></timestamps></service>
<service><timestamps><log><datetime><msec/></datetime></log></timestamps></service>
<service operation="delete" ><password-encryption/></service>
<service><internal/></service>
<hostname><SystemNetworkName>Router1</SystemNetworkName></hostname>
<boot-start-marker></boot-start-marker>
<boot><system><TFTPFileNameURL>flash:c7200-js-mz.123-5.9.T</TFTPFileNameURL></system></boot>
<boot-end-marker></boot-end-marker>
<logging><message-counter><syslog/></message-counter></logging>
<enable><password><UnencryptedEnablePassword>secret</UnencryptedEnablePassword></password></enable>
<aaa operation="delete" ><new-model/></aaa>
<ip><cef/></ip>
<ip operation="delete" ><domain><lookup/></domain></ip>
<DefaultDomainName>cisco.com</DefaultDomainName>
<ip><domain><name><DefaultDomainName>cisco.com</DefaultDomainName></name></domain></ip>
<ip><host><NameHost>host1 </NameHost><HostIPAddress>10.66.152.11</HostIPAddress></host></ip>
<ip><host><NameHost>host2 </NameHost><HostIPAddress>10.2.2.2</HostIPAddress></host></ip>
<multilink><bundle-name><authenticated/></bundle-name></multilink>
</Device-Configuration>