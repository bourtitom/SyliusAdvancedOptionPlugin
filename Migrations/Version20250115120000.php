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

namespace MonsieurBiz\SyliusAdvancedOptionPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Add position column to product option value image table.
 */
final class Version20250115120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add position column to product option value image table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE monsieurbiz_product_option_value_image ADD position INT NOT NULL DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE monsieurbiz_product_option_value_image DROP position');
    }
}
