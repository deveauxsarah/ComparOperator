<?php

/// selection des cartes à afficher?
$destinationCard1 = 'Rome';
$destinationCard2 = 'Londres';
$destinationCard3 = 'Seychelles';
$destinationCard4 = 'Tunis';
$destinationCard5 = 'Mars';

$card1 = new Destinationdetail($destinationCard1);
$card2 = new Destinationdetail($destinationCard2);
$card3 = new Destinationdetail($destinationCard3);
$card4 = new Destinationdetail($destinationCard4);
$card5 = new Destinationdetail($destinationCard5);

$datacard1 = $card1->getAll();
$datacard2 = $card2->getAll();
$datacard3 = $card3->getAll();
$datacard4= $card4->getAll();
$datacard5 = $card5->getAll();

