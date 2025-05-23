<?php

namespace Database\Seeders\Traits;

trait CsvImportTrait
{
    /**
     * Convert a CSV file to an associative array.
     *
     * @param  string  $filePath  Path to the CSV file.
     * @param  string  $delimiter Delimiter used in the CSV file.
     * @return array
     */
    public function csvToArray(string $filePath, string $delimiter = ','): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            return [];
        }

        $data = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Read the header row, assuming the first row contains the column names
            $header = fgetcsv($handle, 1000, $delimiter);
            if ($header) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    // Combine the header with the row to create an associative array
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
