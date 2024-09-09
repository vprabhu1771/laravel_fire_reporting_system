<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FireReportResource\Pages;
use App\Filament\Resources\FireReportResource\RelationManagers;
use App\Models\FireReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\FireReportStatus;

class FireReportResource extends Resource
{
    protected static ?string $model = FireReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('mobile_no')
                    ->required(),
                Forms\Components\TextInput::make('location'),
                Forms\Components\TextInput::make('message'),
                Forms\Components\Select::make('status')
                    ->options(FireReportStatus::class)
                    ->default(FireReportStatus::REQUEST_RECEIVED),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(FireReportStatus::class)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFireReports::route('/'),
            'create' => Pages\CreateFireReport::route('/create'),
            'edit' => Pages\EditFireReport::route('/{record}/edit'),
        ];
    }
}
