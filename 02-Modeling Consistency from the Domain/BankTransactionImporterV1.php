<?php

class BankTransactionImporterV1 {
    /** @var CSVReader */
    private $csv;
    
    public function setCSVReader(CSVReader $csv) {
        $this->csv = $csv;
    }

    public function import($filename) {
        $records = $this->csv->read($filename);

        foreach ($records as $record) {
            $this->fakePersist($record);
        }
    }

    private function fakePersist($record) {
        echo json_encode($record) . "<br>";
    }
}