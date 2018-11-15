<?php
use Migrations\AbstractMigration;

class CreateTableProductsTags extends AbstractMigration
{
    /**
     * Migrate Up
     * 
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('products_tags');
        $table
            ->addColumn('product_id', 'integer', [
                'null' => false
            ])
            ->addColumn('tag_id', 'integer', [
                'null' => true
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', [
                'null' => true
            ])
            ->addForeignKey('product_id', 'products', 'id', [
                'delete'=> 'CASCADE', 
                'update'=> 'NO_ACTION'
            ])    
            ->addForeignKey('tag_id', 'tags', 'id', [
                'delete'=> 'SET_NULL', 
                'update'=> 'NO_ACTION'
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
        $this->table('products_tags')->drop()->save();
    }
}
