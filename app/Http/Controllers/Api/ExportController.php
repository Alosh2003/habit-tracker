<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function csv(): StreamedResponse
    {
        $headers = ['Content-Type' => 'text/csv'];

        return response()->streamDownload(function (): void {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['Habit', 'Date', 'Status']);

            auth()->user()->habits()->with('logs')->get()->each(function ($habit) use ($output): void {
                $habit->logs->each(function ($log) use ($habit, $output): void {
                    fputcsv($output, [$habit->title, $log->date->toDateString(), $log->status]);
                });
            });

            fclose($output);
        }, 'habit-tracker-export.csv', $headers);
    }
}
