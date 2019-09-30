<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Mni\FrontYAML\Parser;
use Jnjxp\Blurb\BlurbInterface;
use Jnjxp\Blurb\Blurb;
use Symfony\Component\Yaml\Yaml;

class FrontMatter implements CodecInterface
{
    protected $parser;

    public function __construct(Parser $parser = null)
    {
        $this->parser = $parser ?? new Parser();
    }

    public function decode(string $blurb_id, string $content) : BlurbInterface
    {
        $document = $this->parser->parse($content);
        $content = (object) [
            'meta' => $document->getYAML(),
            'main' => $document->getContent()
        ];

        return new Blurb($blurb_id, $content);
    }

    public function encode(BlurbInterface $blurb) : string
    {
        $content = $blurb->getContent();
        return sprintf(
            "---\n%s\n---\n\n%s",
            Yaml::dump($content->meta),
            $content->main
        );
    }
}
