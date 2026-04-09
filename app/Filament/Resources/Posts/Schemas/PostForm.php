<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
Use Fillament\Support\Icons\HeroIcon; 
Use Filament\Schemas\Components\Group;


class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Group::make([
                Section::make('Post Details')
                    ->description('Isi data utama post')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Group::make([
                            TextInput::make('title')
                            ->rules('required | min:5 | max:255'),
                            TextInput::make('slug')
                            ->rules('required | min:3')
                            ->unique()
                            ->validationMessages([
                                'unique' => 'Slug tidak boleh sama.',
                            ]),
                            Select::make('category_id')
                                ->rules('required')
                                ->validationMessages([
                                    'required' => 'Category wajib dipilih.',
                                ])
                                ->relationship('category', 'name')
                                ->preload()
                                ->searchable(),
                            ColorPicker::make('color'),
                        ])->columns(2),

                        MarkdownEditor::make('body')
                            ->columnSpanFull(),
                    ]),
                ])->columnSpan(2),

                Group::make([
                Section::make('Image Upload')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->validationMessages([
                                'required' => 'Image wajib diupload.',
                            ])
                            ->disk('public')
                            ->directory('post'),
                    ]),

                Section::make('Meta')
                    ->icon('heroicon-o-cog')
                    ->schema([
                        TagsInput::make('tags'),
                        Checkbox::make('published'),
                        DateTimePicker::make('published_at'),
                    ]),
            ])->columnSpan(1),

        ])
        ->columns(3);
    }
}
