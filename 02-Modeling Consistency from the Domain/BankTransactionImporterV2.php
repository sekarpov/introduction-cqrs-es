<?php

class BankTransactionImporterV2 {
    public function import(CSVReader $csv, $filename) {
        $records = $csv->read($filename);

        foreach ($records as $record) {
            $this->fakePersist($record);
        }
    }

    private function fakePersist($record) {
        echo json_encode($record) . "<br>";
    }
}