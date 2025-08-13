<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('short_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('full_description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(20),
                FileUpload::make('image_path')
                    ->image()
                    ->required(),
                FileUpload::make('image_name')
                    ->image()
                    ->required(),
                TextInput::make('category')
                    ->required(),
                TextInput::make('classification')
                    ->required()
                    ->default('default'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
