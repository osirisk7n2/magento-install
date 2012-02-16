<?php 

class Obj2xml {

    var $xmlResult;
    
    function __construct($rootNode){
        $this->xmlResult = new SimpleXMLElement("<$rootNode></$rootNode>");
    }
    
    private function iteratechildren($object,$xml){
        foreach ($object as $name=>$value) {
            if (is_string($value) || is_numeric($value)) {
                $xml->$name=$value;
            } else {
                $xml->$name=null;
                $this->iteratechildren($value,$xml->$name);
            }
        }
    }
    
    function toXml($object) {
        $this->iteratechildren($object,$this->xmlResult);
        return $this->xmlResult->asXML();
    }
}

//----test object----
$ob->global->install->date = write"Tue, 31 Jan 2012 16:26:32 +0000";
$ob->global->crypt = "a1c7cec1bc010e443bff2ef1df04fe3a";
// print_r($ob); die;
$ob->field2->field21="textA";
// print_r($ob); die;
$ob->field2->field22="textB";
//----test object----

$converter = new Obj2xml("config");

header("Content-Type:text/xml");

echo $converter->toXml($ob);
    
?>