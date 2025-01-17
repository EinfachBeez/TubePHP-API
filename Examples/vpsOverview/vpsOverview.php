<?php
//Example out of the project README
use TubeAPI\Objects;

require 'vendor/autoload.php'; //Load the Composer autoloader

$password = "Password123";
$mail = "E-Mail@Address.tld";

try {
    //login using the credentials of an existing tube-hosting.de account (the login returns a new user object)
    $user = Objects\User::login(new Objects\AuthenticationLoginData($mail, $password)); 
    
    $vps = Objects\VPS::getServerById(488); //get a VPS by the id, returns new VPS object
    $vpsStatus = Objects\VPS::getServerStatusById(488); //get status information of VPS, returns new VpsStatus Object

    //print different information about the VPS
    print "Overview ".$vps->getVpsType()." - ".$vps->getName() . "\n";
    print "Node: " . $vps->getNodeId() . "\n";
    print "IP: " . $vps->getPrimaryIPv4()->getIpv4()->getIpv4() ."\n";
    print "OS: " . $vps->getOsDisplayName() . "\n";
    print " - " . $vps->getCoreCount() . " CPU Cores, Usage: ".(int)($vpsStatus->getCpu()*100) . "%\n";
    print " - " . number_format($vpsStatus->getMem() / 1048576) . "/".  number_format($vps->getMemory()) ." GB RAM\n";
    print " - " . $vps->getDiskType() ." -> " . number_format($vps->getDiskSpace()/1024) ." GB\n";
    print "Price: €" . $vps->getPrice()/100 . " (".$vps->getPriceType().")\n";
    print "Bought on: " . $vps->getStartDate() . "\n";
    print "Paid until: " . $vps->getRuntime() . "\n";

} catch (\Exception $e) {
    print $e->getMessage() . "\n";
}
?>