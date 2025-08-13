<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
                RichEditor::make('full_description')
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
                FileUpload::make('image_name')
                    ->image()
                    ->disk('products')
                    ->required(),
                Select::make('category')
                    ->required()
                    ->options([
                        'white' => 'White',
                        'black' => 'Black',
                        'gold' => 'Gold',
                        'silver' => 'Silver',
                    ]),
                Select::make('classification')
                    ->required()
                    ->options([
                        'default' => 'Default',
                        'exclusivee' => 'Exclusive',
                        'featured' => 'Featured',
                        'upcoming' => 'Upcoming',
                    ]),
                Select::make('status')
                    ->required()->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
            ]);
    }
}
