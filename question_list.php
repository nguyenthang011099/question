<?php
require ('question.php');
class QuestionList
{
    private $questionList = [];//creat questionList array
    public function parse()
    {
        $file = fopen("question.md", "r") or die ("unable");
        while (!feof($file)) {
            $question = new Question(); //khoi tao doi tuong question of class Question
            $result = fgets($file);
            $result = str_replace('######', "cau ", $result);// edit 
            $result = str_replace('####', "", $result);// edit 
            if (!preg_match("/<details>/", $result)) {
                $question->questionContent .= $result;
                    //echo $result; //test print question result
            } else {
                while (!feof($file)) {
                    $question->answer .= $result;
                    $result = fgets($file);
                    if (preg_match("/---/", $result)) {
                        break;
                    }
                    // echo $result; //test print answer result
                }
            }
            $this->questionList[] = $question;
            echo $question;
        }
        fclose($file);
    }

     public function convert(){
        $result="";
        foreach ($this->questionList as $question){
                $result .=$question;
               // $result .=" \n ==========\n";

        }
        return $result;
    }
}
