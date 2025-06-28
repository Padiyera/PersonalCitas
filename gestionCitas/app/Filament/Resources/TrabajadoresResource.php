<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrabajadoresResource\Pages;
use App\Models\trabajadores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrabajadoresResource extends Resource
{
    protected static ?string $model = trabajadores::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('especialidad')->required(),
                Forms\Components\ColorPicker::make('color')->required(),
                Forms\Components\Textarea::make('disponibilidad')->rows(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('especialidad'),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('disponibilidad')->limit(20),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrabajadores::route('/'),
            'create' => Pages\CreateTrabajadores::route('/create'),
            'edit' => Pages\EditTrabajadores::route('/{record}/edit'),
        ];
    }
}
