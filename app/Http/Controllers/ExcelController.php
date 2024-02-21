<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\SimpleExcel\SimpleExcelWriter;

class ExcelController extends Controller
{
    public function export()
    {
        $data = [
            ['Name', 'Email'],
            ['John Doe', 'john@example.com'],
            ['Jane Doe', 'jane@example.com'],
            // Add more rows as needed
        ];
    
        $timestamp = now()->timestamp;
        $filename = "data_$timestamp.xlsx";
    
        $excel = SimpleExcelWriter::create(storage_path("exports/$filename"));
        $excel->addRows($data);
        // $excel->save($filename);
    
        // Chuyển hướng về màn hình có nút export với tên file truyền qua
        return redirect()->route('export', ['filename' => $filename]);
    }
    
    public function exportScreen(Request $request)
    {
        // Lấy tên file từ request
        $filename = $request->input('filename');
    
        // Truyền tên file vào view để có thể sử dụng trong nút export
        return view('export', compact('filename'));
    }
    public function import(Request $request)
    {
        $file = $request->file('import_file');

        $rows = SimpleExcelReader::create($file->path())->getRows();

        foreach ($rows as $row) {
            // Process data from each row
            // Example: Save to the database
        }

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function showExportView()
    {
        return view('export');
    }

    public function showImportView()
    {
        return view('import');
    }
}
