<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Filament\Resources\CityResource\RelationManagers;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';


    // membuat fungsi create untuk tabel City
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //membuat form upload 
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('cities')
                    ->required()
                    ->columnSpan(2),
                    //membuat form nama
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->debounce(500) //memberikan delai 
                    ->reactive() // ketika form nama diinputkan maka nanti inputan slug akan bereaksi
                    ->afterStateUpdated(function ($state, callable $set){
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required(),
            ]);
    }


    // Membuat kode untuk menampilkan data untuk tabel city
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])

            // Membuat fungsi Action untuk delete, edit dan view secara otomatis
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCities::route('/'),
            'create' => Pages\CreateCity::route('/create'),
            'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}
