<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitasResource\Pages;
use App\Models\Citas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CitasResource extends Resource
{
    protected static ?string $model = Citas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'nombre')
                    ->required(),
                Forms\Components\DateTimePicker::make('inicio')
                    ->required()
                    ->seconds(false), 
                Forms\Components\DateTimePicker::make('fin')
                    ->required()
                    ->seconds(false),
                Forms\Components\Select::make('trabajadores')
                    ->label('Trabajadores')
                    ->multiple()
                    ->relationship('trabajadores', 'nombre')
                    ->required(),
                Forms\Components\Textarea::make('notas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.nombre')->label('Cliente'),
                Tables\Columns\TextColumn::make('inicio')
                    ->dateTime('Y-m-d H:i')->label('Inicio'),
                Tables\Columns\TextColumn::make('fin')
                    ->dateTime('Y-m-d H:i')->label('Fin'),
                Tables\Columns\TextColumn::make('trabajadores')
                    ->label('Trabajadores')
                    ->formatStateUsing(fn ($record) => $record->trabajadores->pluck('nombre')->join(', ')),
                Tables\Columns\TextColumn::make('notas')->limit(20),
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
            'index' => Pages\ListCitas::route('/'),
            'create' => Pages\CreateCitas::route('/create'),
            'edit' => Pages\EditCitas::route('/{record}/edit'),
        ];
    }
}
