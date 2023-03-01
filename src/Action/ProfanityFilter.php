<?php

namespace Bobwez98\ProfanityFilter\Action;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class ProfanityFilter
{
    protected string $responseType = 'xml';

    protected array $responseTypes = [
        'xml',
        'json',
        'plain',
        'containsprofanity'
    ];

    public function __construct(
        protected string $url = 'https://www.purgomalum.com/service'
    ) {}

    public function setResponseType(string $type)
    {
        $this->responseType = $type;

    }

    protected function getUrl(string $type) : string
    {
        return $this->url . '/' . $type;
    }

    protected function doRequest(string $text, string $type): Response
    {
        return Http::get($this->getUrl($type), [
            'text' => $text
        ]);
    }

    public function json(string $text) : object
    {
        return json_decode(
            $this->doRequest(
                $text,
                'json'
            )
        );
    }

    public function plain(string $text) : string
    {
        return $this->doRequest(
                $text,
                'plain'
        );
    }

    public function containsprofanity(string $text) : bool
    {
        return (bool) $this->doRequest(
            $text,
            'containsprofanity'
        )->body();
    }

    public function xml(string $text) : SimpleXMLElement
    {
        return simplexml_load_string(
            $this->doRequest(
                $text,
                'xml'
        )->body());
    }
}
