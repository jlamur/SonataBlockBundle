<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\BlockBundle\Tests\Block;

use PHPUnit\Framework\TestCase;
use Sonata\BlockBundle\Block\BlockContext;

class BlockExecutionContextTest extends TestCase
{
    public function testBasicFeature()
    {
        $block = $this->createMock('Sonata\BlockBundle\Model\BlockInterface');

        $blockContext = new BlockContext($block, [
            'hello' => 'world',
        ]);

        $this->assertEquals('world', $blockContext->getSetting('hello'));
        $this->assertEquals(['hello' => 'world'], $blockContext->getSettings());

        $this->assertEquals($block, $blockContext->getBlock());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testInvalidParameter()
    {
        $block = $this->createMock('Sonata\BlockBundle\Model\BlockInterface');

        $blockContext = new BlockContext($block);

        $blockContext->getSetting('fake');
    }
}
