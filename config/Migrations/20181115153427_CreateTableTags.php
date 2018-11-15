<?php
use Migrations\AbstractMigration;

class CreateTableTags extends AbstractMigration
{
    /**
     * Migrate Up
     * 
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('tags');
        $table
            ->addColumn('name', 'string', [
                'limit' => 255, 
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
     * @return void
     */
    public function down(): void
    {
        $this->table('tags')->drop()->save();
    }
}
