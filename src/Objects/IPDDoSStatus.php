<?php

namespace TubeAPI\Objects;

use TubeAPI\TubeAPI;

require_once __DIR__ . '/../TubeAPI.php';

class IPDDoSStatus
{

    private string $layer4;

    private string $layer7;


    /**
     * @return string
     */
    public function getLayer4(): string
    {
         return $this->layer4;
     }

    /**
     * @return string
     */
    public function getLayer7(): string
    {
         return $this->layer7;
     }

    /**
     * @param string $layer4
     * @param string $layer7
     */
    public function __construct(string $layer4, string $layer7)
    {
        $this->layer4 = $layer4;
        $this->layer7 = $layer7;
    }

    /**
     * @return array
     */
    public function getAsArr()
    {
        return
        [
        'layer4' => $this->getLayer4(),
        'layer7' => $this->getLayer7(),
        ];
    }

    /**
     * @param object $object
     * @return IPDDoSStatus
     */
    public static function fromStdClass(object $object):IPDDoSStatus
    {
        $layer4 = (string) $object->layer4;
        $layer7 = (string) $object->layer7;

        return new IPDDoSStatus($layer4, $layer7);
     }
}
