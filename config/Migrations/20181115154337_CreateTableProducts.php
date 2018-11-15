<?php
use Migrations\AbstractMigration;

class CreateTableProducts extends AbstractMigration
{
    /**
     * Migrate Up.
     * 
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('products');
        $table
            ->addColumn('title', 'string', [
                'limit' => 255, 
                'null' => false
            ])
            ->addColumn('description', 'text', [
                'null' => true
            ])
            ->addColumn('image', 'string', [
                'limit' => 255, 
                'null' => true
            ])
            ->addColumn('stock', 'integer', [
                'null' => false
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', [
                'null' => true
            ])
            ->create();
    }

    /**
     * Migrate Down.
     * 
     * @return type
     */
    public function down(): void
    {
        $this->table('products')->drop()->save();
    }
}
