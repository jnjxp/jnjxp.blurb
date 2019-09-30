<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Psr\Container\ContainerInterface;

class CodecStrategyFactory
{
    public function __invoke() : CodecInterface
    {
        $void = new VoidCodec();
        $codecs = [
            'txt'         => $void,
            'html'        => $void,
            'json'        => new Json(),
            'lines'       => new Lines(),
            'frontmatter' => new FrontMatter(),
        ];

        return new CodecStrategy($codecs);
    }
}
