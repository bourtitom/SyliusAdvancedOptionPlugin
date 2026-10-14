<?php

/*
 * This file is part of Monsieur Biz' Advanced Option plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\MonsieurBiz\SyliusAdvancedOptionPlugin\Unit\DependencyInjection;

use MonsieurBiz\SyliusAdvancedOptionPlugin\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;

final class ConfigurationTest extends TestCase
{
    public function testMissingRenderersKeyGivesEmptyArray(): void
    {
        $config = (new Processor())->processConfiguration(new Configuration(), []);

        self::assertSame(['renderers' => []], $config);
    }

    public function testKeyedRendererKeepsItsKeyAndFields(): void
    {
        $config = (new Processor())->processConfiguration(new Configuration(), [[
            'renderers' => [
                'thumb' => [
                    'label' => 'Thumbnail',
                    'template' => '@MonsieurBizSyliusAdvancedOption/thumb.html.twig',
                ],
            ],
        ]]);

        self::assertSame([
            'renderers' => [
                'thumb' => [
                    'label' => 'Thumbnail',
                    'template' => '@MonsieurBizSyliusAdvancedOption/thumb.html.twig',
                ],
            ],
        ], $config);
    }

    public function testRendererMissingLabelIsInvalid(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        (new Processor())->processConfiguration(new Configuration(), [[
            'renderers' => [
                'thumb' => ['template' => 'thumb.html.twig'],
            ],
        ]]);
    }

    public function testRendererWithEmptyTemplateIsInvalid(): void
    {
        $this->expectException(InvalidConfigurationException::class);

        (new Processor())->processConfiguration(new Configuration(), [[
            'renderers' => [
                'thumb' => ['label' => 'Thumbnail', 'template' => ''],
            ],
        ]]);
    }
}
