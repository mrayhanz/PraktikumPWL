<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry\badgeColor;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product Tabs')
                    ->tabs([
                        Tab::make('Product Details')
                        ->icon('heroicon-o-cube')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Product Name')
                                    ->weight('bold')
                                    ->color('primary'),
                                TextEntry::make('id')
                                    ->label('Product ID'),
                                TextEntry::make('sku')
                                    ->label('Product SKU')
                                    ->badge()
                                    ->color('success'),
                                TextEntry::make('description')
                                    ->label('Product Description'),
                                TextEntry::make('created_at')
                                    ->label('Product Creation Date')
                                    ->date('d M Y')
                                    ->color('info'),
                            ]),
                        Tab::make('Product Price and Stock')
                        ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                TextEntry::make('price')
                                    ->label('Product Price')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                                    ->icon('heroicon-o-currency-dollar'),
                                TextEntry::make('stock')
                                    ->label('Product Stock')
                                    ->badge()
                                    ->color(fn ($state) => $state > 10 ? 'success' : 'danger')
                                    ->icon('heroicon-o-cube'),
                            ]),
                        Tab::make('Image and Status')
                        ->icon('heroicon-o-photo')
                            ->schema([
                                ImageEntry::make('image')
                                    ->label('Product Image')
                                    ->disk('public'),
                                TextEntry::make('price')
                                    ->label('Product Price')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                                    ->icon('heroicon-o-currency-dollar'),
                                TextEntry::make('stock')
                                    ->label('Product Stock')
                                    ->weight('bold')
                                    ->badge(fn ($record) => $record->stock)
                                    ->icon('heroicon-o-cube'),
                                IconEntry::make('is_active')
                                    ->label('Product Status')
                                    ->boolean(),
                                IconEntry::make('is_featured')
                                    ->label('is Featured?')
                                    ->boolean(),
                            ]),
                    ])
                    ->columnSpanFull()
                    ->vertical(),
            //     Section::make('Product Info')
            //         ->description('')
            //         ->schema([
            //         TextEntry::make('name')
            //             ->label('Product Name')
            //             ->weight('bold')
            //             ->color('primary'),
            //         TextEntry::make('id')
            //             ->label('Product ID'),
            //         TextEntry::make('sku')
            //             ->label('Product SKU')
            //             ->badge()
            //             ->color('success')
            //             ->badge()
            //             ->color('warning'),
            //         TextEntry::make('description')
            //             ->label('Product Description'),
            //         TextEntry::make('created_at')
            //             ->label('Product Creation Date')
            //             ->date('d M Y')
            //             ->color('info'),
            //         ])
            //         ->columnSpanFull(),

            //     Section::make('Price and Stock')
            //         ->description('')
            //         ->schema([
            //             TextEntry::make('price')
            //                 ->label('Product Price')
            //                 ->weight('bold')
            //                 ->color('primary')
            //                 ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
            //                 ->icon('heroicon-o-currency-dollar'),
            //             TextEntry::make('stock')
            //                 ->label('Product Stock')
            //                 ->icon('heroicon-o-cube'),
            //         ])
            //         ->columnSpanFull(),

            //     Section::make('Image and Status')
            //         ->description('')
            //         ->schema([
            //             ImageEntry::make('image')
            //                 ->label('Product Image')
            //                 ->disk('public'),
            //             TextEntry::make('price')
            //                 ->label('Product Price')
            //                 ->weight('bold')
            //                 ->color('primary')
            //                 ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
            //                 ->icon('heroicon-o-currency-dollar'),
            //             TextEntry::make('stock')
            //                 ->label('Product Stock')
            //                 ->weight('bold')
            //                 ->color('primary')
            //                 ->icon('heroicon-o-cube'),
            //             IconEntry::make('is_active')
            //                 ->label('is Active?')
            //                 ->boolean(),
            //             IconEntry::make('is_featured')
            //                 ->label('is Featured?')
            //                 ->boolean(),
                        
            //         ])
            //         ->columnSpanFull(),
            ]);
    }
}

