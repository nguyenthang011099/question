<?php
class Sentence
{
    public $question;
    public $answer;

    public function print_sentence()
    {
        echo $this->question;
        echo "\n";
        echo $this->answer;
    }
}
$sentence =new Sentence();
$sentence->question='what is your name';
$sentence->answer='my name is Thang';

$sentence->print_sentence();

