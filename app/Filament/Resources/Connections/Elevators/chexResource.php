<?php
namespace App\Filament\Resources\Connections\Elevators;

use App\Filament\Resources\Connections\Elevators\chexResource\Pages;
use App\Models\external;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class chexResource extends Resource
{
    protected static ?string $model                 = external::class;
    protected static ?string $slug                  = 'connection.elevators.chex';
    protected static ?string $navigationIcon        = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index'  => Pages\Listchexes::route('/'),
            'create' => Pages\Createchex::route('/create'),
            'edit'   => Pages\Editchex::route('/{record}/edit'),
        ];
    }
}
