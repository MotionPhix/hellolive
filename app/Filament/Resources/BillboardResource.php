<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillboardResource\Pages;
use App\Models\Billboard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BillboardResource extends Resource
{
  protected static ?string $model = Billboard::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Card::make()
          ->schema([
            Forms\Components\TextInput::make('name')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('location')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('city')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('state')
              ->maxLength(255),
            Forms\Components\Select::make('country')
              ->required()
              ->options([
                'Malawi' => 'Malawi',
                'Zambia' => 'Zambia',
              ]),
            Forms\Components\Select::make('status')
              ->required()
              ->options([
                'available' => 'Available',
                'occupied' => 'Occupied',
                'maintenance' => 'Under Maintenance',
              ]),
            Forms\Components\Textarea::make('description')
              ->maxLength(65535),
            Forms\Components\Grid::make()
              ->schema([
                Forms\Components\TextInput::make('dimensions.width')
                  ->required()
                  ->numeric()
                  ->label('Width (m)'),
                Forms\Components\TextInput::make('dimensions.height')
                  ->required()
                  ->numeric()
                  ->label('Height (m)'),
              ]),
            Forms\Components\Grid::make()
              ->schema([
                Forms\Components\TextInput::make('latitude')
                  ->required()
                  ->numeric()
                  ->step('0.000001'),
                Forms\Components\TextInput::make('longitude')
                  ->required()
                  ->numeric()
                  ->step('0.000001'),
              ]),
            Forms\Components\TextInput::make('monthly_rate')
              ->required()
              ->numeric()
              ->prefix('MWK'),
            Forms\Components\SpatieMediaLibraryFileUpload::make('billboard_images')
              ->collection('billboard_images')
              ->multiple()
              ->maxFiles(5)
              ->reorderable(),
          ])->columns(2)
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
        Tables\Columns\TextColumn::make('location')->searchable(),
        Tables\Columns\TextColumn::make('city')->searchable(),
        Tables\Columns\TextColumn::make('country')->searchable(),
        Tables\Columns\BadgeColumn::make('status')
          ->colors([
            'success' => 'available',
            'warning' => 'maintenance',
            'danger' => 'occupied',
          ]),
        Tables\Columns\TextColumn::make('monthly_rate')
          ->money('USD')
          ->sortable(),
      ])
      ->filters([
        Tables\Filters\SelectFilter::make('country')
          ->options([
            'Malawi' => 'Malawi',
            'Zambia' => 'Zambia',
          ]),
        Tables\Filters\SelectFilter::make('status')
          ->options([
            'available' => 'Available',
            'occupied' => 'Occupied',
            'maintenance' => 'Under Maintenance',
          ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListBillboards::route('/'),
      'create' => Pages\CreateBillboard::route('/create'),
      'edit' => Pages\EditBillboard::route('/{record}/edit'),
    ];
  }
}
