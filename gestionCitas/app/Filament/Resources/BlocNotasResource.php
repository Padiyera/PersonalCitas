<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlocNotasResource\Pages;
use App\Models\BlocNotas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlocNotasResource extends Resource
{
    protected static ?string $model = BlocNotas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('contenido')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha'),
                Tables\Columns\TextColumn::make('contenido')->limit(30),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlocNotas::route('/'),
            'create' => Pages\CreateBlocNotas::route('/create'),
            'edit' => Pages\EditBlocNotas::route('/{record}/edit'),
        ];
    }
}
