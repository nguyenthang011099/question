<?php


class Question
{
    public $questionContent;
    public $answer;

    public function print_sentence()
    {
        echo $this->question;
        echo "\n";
        echo $this->answer;
    }

    function setQuestion($value)
    {
        $this->questionContent = $value;
    }

    function setAnswer($value)
    {
        $this->answer = $value;
    }

    function getQuestion()
    {
        return $this->question;
    }

    function getAnswer()
    {
        return $this->answer;
    }

    function __toString()
    {
        return $this->questionContent . $this->answer . "\n---\n";
    }

    function __constructor($questionContent, $answer)
    {
        $this->questionContent = $questionContent;
        $this->answer = $answer;
    }

}



