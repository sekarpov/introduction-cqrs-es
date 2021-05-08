<?php

class CompanyNameIsInvalid extends \Exception {
    public function __construct($companyName) {
        parent::__construct("Company Name [{$companyName}] is invalid.");
    }
}