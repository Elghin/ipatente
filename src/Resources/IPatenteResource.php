<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IPatenteResource\Pages;
use App\Filament\Resources\IPatenteResource\RelationManagers;
use App\Models\IPatente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class IPatenteResource extends Resource
{
    protected static ?string $model = IPatente::class;
    protected static ?string $navigationIcon = 'heroicon-o-cloud';
    protected static ?string $navigationGroup = 'iPatente';
    protected static ?string $navigationLabel = 'Lista Form Attive';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nome')->label('Nome')->required()->minLength(2)->maxLength(255)->unique(ignoreRecord: true),
                        TextInput::make('gruppo')->label('Gruppo')->required()->minLength(2)->maxLength(255)->unique(ignoreRecord: true),
                        TextInput::make('iPatente_code')->label('codice iPatente')->required()->minLength(2)->maxLength(255)->unique(ignoreRecord: true),
                        TextInput::make('anwip_sh')->label('Shortcode ANW')->required()->minLength(2)->maxLength(255),
                        TextInput::make('ahb_sh')->label('Schortcode Website')->required()->minLength(2)->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gruppo')->sortable()->searchable(),
                TextColumn::make('nome')->sortable()->searchable(),
                TextColumn::make('iPatente_code')->sortable()->searchable(),
                TextColumn::make('anwip_sh')->sortable()->wrap(),
                TextColumn::make('ahb_sh')->sortable()->wrap()
            ])
            ->defaultSort('gruppo', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListIPatentes::route('/'),
            'create' => Pages\CreateIPatente::route('/create'),
            'edit' => Pages\EditIPatente::route('/{record}/edit'),
        ];
    }
}
