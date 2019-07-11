<?php

class QuestionList
{
    private $questionList = [];


    public function parse($path)
    {
        $file = fopen($path, "r") or die("Unable to open file!");
        $count = 1;
        while(!feof($file)) {
            $question  = new Question("", "");

            $line = fgets($file);
            if(preg_match("/###### [0-9]*\./", $line, $matches)) {

                $line =  "### Đây là câu $count: " . str_replace($matches, "", $line);

                while (!feof($file)) {
                    if(!preg_match("/<details>/", $line)) {
                        $question->questionContent .= $line;
                        $line = fgets($file);
                    }
                    else {

                        $count++;

                        while (!feof($file)) {
                            $question->answer .= $line;
                            $line = fgets($file);

                            if(preg_match("/---/", $line)) {
                                break;
                            }
                        }
                    }

                    if(preg_match("/---/", $line)) {
                        break;
                    }
                }

                $this->questionList[] = $question;
            }
        }

        fclose($file);
    }
    public function all(        )
    {
        $result = '' ;
        foreach ($this->questionList as $question) {
            $result .= $question;
        }
        return $result;
    }

}