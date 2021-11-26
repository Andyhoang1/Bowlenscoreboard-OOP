<?php


class ScoreBoard
{
    private $scores = [];
    private $players = [];
    private $totaal = [];

    public function __construct($players)
    {
        $this->players = $players;
    }
    private function calculatePlayerScore($player)
    {   
        $pins = $player->getPinsThrown();
        $totaalvanspeler = 0;
        foreach ($pins as $round) {
            $roundtotal = $round[0] + $round[1];
            $totaalvanspeler = $totaalvanspeler + $roundtotal;
            $this->scores[$player->getName()] = $totaalvanspeler;
        }
    }
    private function calculateAllScores()
    {                                                       
        foreach ($this->players as $player) {
            $this->calculatePlayerScore($player);
        }
    }
    public function displayScores()
    {
        $this->calculateAllScores();
        foreach ($this->scores as $name => $totaalvanspeler) {
            echo $name . " heeft dit gegooid: " . $totaalvanspeler . PHP_EOL;
        }
        $this->totaal = $totaalvanspeler;
    }
    public function displayWinner()
    {
        $score = 0;
        foreach ($this->scores as $nameplayer => $totaalvanspeler) {
            if ($totaalvanspeler > $score) {
                $score = $totaalvanspeler;
                $naam = $nameplayer;
            }
        }
        echo "$naam is de winner met $score punten ";
    }
}
?>