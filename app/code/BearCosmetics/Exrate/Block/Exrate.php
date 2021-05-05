<?php

namespace BearCosmetics\Exrate\Block;

class Exrate extends \Magento\Framework\View\Element\Template {
    const FEED_URL = "https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx?b=68";

    
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function fetchExrate() {
        $xml_string = file_get_contents(self::FEED_URL);
        $xml = simplexml_load_string($xml_string, 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        return $array['Exrate'];
    }
}