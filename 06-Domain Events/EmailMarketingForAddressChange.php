<?php

class EmailMarketingForAddressChange extends EventHandler {
    /** @var Mailer */
    private $mailer;
    /** @var PersonRepository */
    private $people;

    public function __construct(Mailer $mailer, PersonRepository $people) {
        $this->mailer = $mailer;
        $this->people = $people;
    }

    public function handle(PersonChangedTheirAddressV2 $event) {
        $person = $this->people->withId($event->personId());
        $this->mailer->sendTo($person->email())->content("...");
    }
}