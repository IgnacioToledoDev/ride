<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanResource\Pages;
use App\Filament\Resources\PlanResource\RelationManagers;
use App\Models\Plan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre')
                    ->maxLength(255),
                TextInput::make('storageLimit')
                    ->label('Limite de almacenamiento')
                    ->required()
                    ->numeric(),
                TextInput::make('bandwidthLimit')
                    ->label('Limite de ancho de banda')
                    ->required()
                    ->numeric(),
                TextInput::make('ramLimit')
                    ->label('Limite de RAM')
                    ->required()
                    ->numeric(),
                Textarea::make('description')
                    ->label('Descripcion')
                    ->required(),
                Checkbox::make('isPublic')
                    ->label('Es publico')
                    ->default(false)
                    ->required(),
                Checkbox::make('isPopular')
                    ->label('Es popular')
                    ->default(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nombre')
                ->sortable(),
                TextColumn::make('storageLimit')
                ->label('Limite de almacenamiento')
                ->sortable(),
                TextColumn::make('bandwidthLimit')
                ->label('Limite de ancho de banda')
                ->sortable(),
                TextColumn::make('ramLimit')
                ->label('Limite de RAM')
                ->sortable(),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }
}
