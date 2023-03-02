<?php

namespace Bobwez98\ProfanityFilter\Action;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class ProfanityFilter
{
    public function __construct(
        protected string $url = 'https://www.purgomalum.com/service'
    ) {}

    /**
     * @param string $type
     * @return string
     */
    protected function getUrl(string $type) : string
    {
        return $this->url . '/' . $type;
    }

    /**
     * @param string $text
     * @param string $type
     * @return Response
     */
    protected function doRequest(string $text, string $type): Response
    {
        return Http::get($this->getUrl($type), [
            'text' => $text
        ]);
    }

    /**
     * @param string $text
     * @return object
     */
    public function json(string $text) : object
    {
        return json_decode(
            $this->doRequest(
                $text,
                'json'
            )
        );
    }

    /**
     * @param string $text
     * @return string
     */
    public function plain(string $text) : string
    {
        return $this->doRequest(
                $text,
                'plain'
        );
    }

    /**
     * @param string $text
     * @return bool
     */
    public function containsprofanity(string $text) : bool
    {
        return (bool) $this->doRequest(
            $text,
            'containsprofanity'
        )->body();
    }

    /**
     * @param string $text
     * @return SimpleXMLElement
     */
    public function xml(string $text) : SimpleXMLElement
    {
        return simplexml_load_string(
            $this->doRequest(
                $text,
                'xml'
        )->body());
    }
}
