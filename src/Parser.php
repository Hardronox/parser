<?php

namespace Acme;

include ('simple_html_dom.php');

class Parser {

    private $site;

    /**
     * Parser constructor.
     * @param $site
     */
    public function __construct($site)
    {
        $this->site = $site;
    }

    /**
     * @return bool|\simple_html_dom
     */
    public function connectToSite()
    {
        $context = stream_context_create(array(
            'http' => array(
                'header' => array('User-Agent: Mozilla/6.0 (Windows; U; Windows NT 8.1; rv:2.2) Gecko/20110201'),
            ),
        ));

        $html = file_get_html($this->site, 0, $context);

        return $html;
    }

    /**
     * @return array
     */
    public function getSiteUrlAndValue()
    {
        $html=$this->connectToSite();

        $value=$html->find('span[class=engagementInfo-valueNumber js-countValue]');

        return [$this->site, $value[0]->innertext];
    }
}
