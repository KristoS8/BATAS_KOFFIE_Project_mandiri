<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table->
        columns([
            
        TextColumn::make('id')->label('ID')->searchable(),

        TextColumn::make('ID_Reservasi')->label('Kode Reservasi')->searchable(),

        TextColumn::make('customer_name')->label('Nama Customer')->searchable(),

        TextColumn::make('phone_number')->label('No. HP'),

        TextColumn::make('reservation_date')->label('Tanggal Menempati'),

        TextColumn::make('reservation_time')->label('Waktu Menempati'),

        TextColumn::make('total_guest')->label('Total Tamu'),

        TextColumn::make('note')->label('Catatan'),

        SelectColumn::make('status')->label('Status Reservation')->options([
            'pending' => '⏳Menunggu',
            'approved' => '✅Konfirmasi',
            'rejected' => '❌Ditolak',
            'cancelled' => '💔Dibatalkan User',
        ]),
        
        ]);
    }
}
