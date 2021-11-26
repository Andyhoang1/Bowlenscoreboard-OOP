<?php
require_once "Player.php";
require "ScoreBoard.php";
class BowlingGame
{
    private $scoreBoard;
    private $players = [];
    private $round = 1;
    public function __construct()
    {
        $aantal = readline("hoeveel spelers wil je toevoegen? ");
        for ($i = 0; $i < $aantal; $i++) {
            $name = readline("wat is jou naam? ");
            $this->addPlayer($name);
        }
        $this->scoreBoard = new ScoreBoard($this->players);
    }
    private function addPlayer($name)
    {
        $playerobject = new Player($name);
        $this->players[] = $playerobject;
    }
    private function playRound()
    {
        foreach ($this->players as $player) {
            $worp1 = readline("worp 1 van {$player->getName()}: ");
            $worp2 = readline("worp 2 van {$player->getName()}: ");
            $totaal = $worp1 + $worp2;
            $player->throwPins($worp1, $worp2);
        }
        $this->round = $this->round + 1;
    }
    private function playLastRound()
    {
        foreach ($this->players as $player) {
            $lastthrow = readline("laatste worp van {$player->getName()}: ");  
        }
    }
    public function play()
    {
        for ($h = 0; $h < 10; $h++) { 
            $this->playRound();
            $this->scoreBoard->displayScores();
            echo "ronde $this->round" . PHP_EOL;
        }
        $this->playLastRound();
        $this->scoreBoard->displayScores();
        $this->scoreBoard->displayWinner();
    }
}


?>