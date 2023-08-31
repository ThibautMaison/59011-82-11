<?php

    /**
     * Initialize the var of the game
     *
     * @return
     */
    function init(){
        $codeSize = initCodeSize();
        $nbTry = initAttemptsNbr();
        $board = initBoard($codeSize, $nbTry);
        $nbColor = initColorNbr();
        $code = initCode($nbColor, $codeSize);
        run($board, $nbColor, $code, $nbTry, $codeSize);
    }


        /**
         * Init the size of the secret code
         *
         * @return integer // size of the code that also the lenght of the board
         */
        function initCodeSize(){
            $codeSize = readline("Enter the size of the code : ");
            while(!ctype_digit($codeSize)){
                $codeSize = readline("Enter the size of the code : ");
            }
            return $codeSize;
        }


        /**
         * Init the number of try for this game
         *
         * @return integer // number of try wanted that also the height of the board
         */
        function initAttemptsNbr(){
            $nbTry = readline("Enter the number of attempts : ");
            while(!ctype_digit($nbTry)){
                $nbTry = readline("Enter the number of attempts : ");
            }
            return $nbTry;
        }


        /**
         * InitBoard create an empty board that will be printed each turn
         *
         * @param integer $x lenght / secret code size
         * @param integer $y height / number of try
         * @return array  // array of the board
         */
        function initBoard(int $x, int $y){
            $board = [];
            for($i = 0; $i < $y; $i++){
                $board[$i] = [];
                for($j = 0; $j < $x; $j++){
                    $board[$i][$j] = " ";
                }
            }
            return $board;
        }


        /**
         * Init the number of different value that can be in the code
         *
         * @return integer // number of value
         */
        function initColorNbr(){
            $nbColor = readline("Enter the number of different color : ");
            while(!ctype_digit($nbColor)){
                $nbColor = readline("Enter the number of different color : ");
            }
            return $nbColor;
        }


        /**
         * Init a random secret code with code size and the number of different char
         *
         * @param integer $nbColor 
         * @param integer $codeSize
         * @return string $code generated code
         */
        function initCode(int $nbColor, int $codeSize){
            $code = "";
            for($i = 0; $i < $codeSize; $i++){
                $code .= chr(rand(65, 65+$nbColor-1));
            }
            return $code;   
        }


    /**
     * Game loop
     *
     * @param array $board
     * @param integer $nbColor
     * @param string $code
     * @param integer $nbTry
     * @param integer $codeSize
     * @return void
     */
    function run(array $board, int $nbColor, int $code, int $nbTry, int $codeSize){
        $final = 0;
        while($final == 0){
            $attempt = userInput($nbColor, $codeSize);
            $result = checkCode($attempt, $code);
            $board = updateBoard($attempt, $result, $board);
            displayBoard($board, $result);
            $nbTry--;
            $final = checkWin($nbTry, $result);
        }
        endGame($final);
    }


        /**
         * Check the attempt and the secret code and return the result of the attempt
         *
         * @param string $attempt
         * @param string $code
         * @return string $result
         */
        function checkCode(string $attempt, string $code){
            $result = "";
            for($i = 0; $i < strlen($attempt); $i++){
                if($attempt[$i] == $code[$i]){
                    $result .= "B";
                }elseif(strpos($code, $attempt[$i]) !== false){
                    $result .= "W";
                }else{
                    $result .= " ";
                }
            }
            return $result;
    }
        /**
         * Ask the user to enter a code and verify the compliance of it
         *
         * @param integer $nbColor
         * @param integer $codeSize
         * @return string $attempt last entry of the user
         */
        function userInput(int $nbColor, int $codeSize){
            
        }
        

        /**
         * Check how many correct colors at the good place and correct color at the wrong
         * place are in the attempt
         *
         * @param string $attempt
         * @param string $code
         * @return string // return the result of the attempt as a string
         */
        function checkInput(string $attempt, int $code){
            $attempt = strtoupper($attempt);
            if(strlen($attempt) != $code){
                echo "Wrong number of char, please enter a code with ".$code." char\n";
                return false;
            }
            for($i = 0; $i < strlen($attempt); $i++){
                if(!ctype_alpha($attempt[$i])){
                    echo "Wrong char, please enter a code with only letters\n";
                    return false;
                }
            }
            return true;
        }


        /**
         * Update the board with the last attempt, the attempts left and the result of the attempt
         *
         * @param string $attempt
         * @param string $result
         * @param array  $board
         * @return array $board updated board with the last attempt
         */
        function updateBoard(string $attempt, string $result, array $board){
            $board[count($board)-1][0] = $attempt;
            $board[count($board)-1][1] = $result;
            return $board;
        }


        /**
         * Display the array of board as a correct board game (with all the attempts)
         *
         * @param array $board
         * @param string $result
         */
        function displayBoard(array $board,string $result){
            for($i = 0; $i < count($board); $i++){
                echo $board[$i][0]." ".$board[$i][1]."\n";
            }
        }


        /**
         * Check if the number of attemps is equal to 0 OR the last attempt is correct
         *
         * @param integer $nbTry
         * @param string $result
         * @return integer $final = 0 game continue, = 1 game winned, = 2 game lost
         */
        function checkWin(int $nbTry, string $result){
            if($nbTry == 0){
                $final = 2;
            }elseif($result == "BBBB"){
                $final = 1;
            }else{
                $final = 0;
            }
            return $final;
        }


    /**
     * Function called at the exit of the game loop, echo win or loose
     *
     * @param integer $final 
     */
    function endGame(int $final){
        if($final == 1){
            echo "You win !\n";
        }else{
            echo "You loose !\n";
        }
    }



init();