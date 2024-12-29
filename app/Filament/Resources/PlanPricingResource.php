<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanPricingResource\Pages;
use App\Models\PlanPricing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class PlanPricingResource extends Resource
{
    protected static ?string $model = PlanPricing::class;

    private const SELECT_OPTION = 'Selecciona una opción ...';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('plan_id')
                    ->label('Plan')
                    ->placeholder(self::SELECT_OPTION)
                    ->options(self::getPlans()),
                TextInput::make('price')
                    ->label('Precio')
                    ->placeholder('Price')
                    ->numeric()
                    ->required(),
                Select::make('billingCycle')
                    ->label('Ciclo de pago')
                    ->placeholder(self::SELECT_OPTION)
                    ->options(self::getBillingCycle()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plan.name')
                    ->label('Plan')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->sortable(),
                TextColumn::make('billingCycle')
                    ->label('Ciclo de pago')
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlanPricings::route('/'),
            'create' => Pages\CreatePlanPricing::route('/create'),
            'edit' => Pages\EditPlanPricing::route('/{record}/edit'),
        ];
    }

    protected static function getPlans(): array
    {
        $result = [];
        $plans = PlanPricing::all();
        foreach ($plans as $plan) {
            $result[] = $plan;
        }

        return $result;
    }

    protected static function getBillingCycle(): array
    {
        return [
            0 => PlanPricing::MONTHLY,
            1 => PlanPricing::YEARLY
        ];
    }
}
