<?php

/**
 * Initialize the var of the game
 *
 * @return array
 */
function init()
{
    $codeSize = initCodeSize();
    $nbTry = initAttemptsNbr();
    $nbColor = initColorNbr();
    $board = initBoard($codeSize, $nbTry);
    $code = initCode($nbColor, $codeSize);
    
    return [$board, $nbColor, $code, $nbTry, $codeSize];
}

/**
 * Initialize the size of the secret code based on user input
 *
 * @return integer // size of the code that also the length of the board
 */
function initCodeSize()
{
    $validInput = false;
    while (!$validInput) {
        echo "Enter the desired code size: ";
        $codeSize = trim(fgets(STDIN));
        if (is_numeric($codeSize) && $codeSize > 0) {
            $validInput = true;
        } else {
            echo "Invalid input. Please enter a valid code size (a positive integer).\n";
        }
    }
    return (int)$codeSize;
}

/**
 * Initialize the number of try for this game based on user input
 *
 * @return integer // number of try wanted that also the height of the board
 */
function initAttemptsNbr()
{
    $validInput = false;
    while (!$validInput) {
        echo "Enter the desired number of tries: ";
        $nbTry = trim(fgets(STDIN));
        if (is_numeric($nbTry) && $nbTry > 0) {
            $validInput = true;
        } else {
            echo "Invalid input. Please enter a valid number of tries (a positive integer).\n";
        }
    }
    return (int)$nbTry;
}

/**
 * Initialize the number of different values that can be in the code based on user input
 *
 * @return integer // number of value
 */
function initColorNbr()
{
    $validInput = false;
    while (!$validInput) {
        echo "Enter the desired number of different colors: ";
        $nbColor = trim(fgets(STDIN));
        if (is_numeric($nbColor) && $nbColor > 0) {
            $validInput = true;
        } else {
            echo "Invalid input. Please enter a valid number of different colors (a positive integer).\n";
        }
    }
    return (int)$nbColor;
}

/**
 * Initialize an empty board
 *
 * @param integer $x length / secret code size
 * @param integer $y height / number of tries
 * @return array // array of the board
 */
function initBoard(int $x, int $y)
{
    $board = [];
    for ($i = 0; $i < $y; $i++) {
        $board[$i] = str_repeat('-', $x);
    }
    return $board;
}

/**
 * Initialize a random secret code with code size and the number of different characters
 *
 * @param integer $nbColor
 * @param integer $codeSize
 * @return string $code generated code
 */
function initCode(int $nbColor, int $codeSize)
{
    $code = '';
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Entire alphabet
    for ($i = 0; $i < $codeSize; $i++) {
        $code .= $alphabet[rand(0, $nbColor - 1)];
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
function run(array $board, int $nbColor, string $code, int $nbTry, int $codeSize)
{
    $final = 0;
    
    while ($final === 0) {
        displayBoard($board, "");
        $attempt = userInput($nbColor, $codeSize);
        $result = checkInput($attempt, $code);
        $board = updateBoard($attempt, $result, $board);
        $final = checkWin($nbTry, $result);
    }
    
    endGame($final);
}

/**
 * Ask the user to enter a code and verify the compliance of it
 *
 * @param integer $nbColor
 * @param integer $codeSize
 * @return string $attempt last entry of the user
 */
function userInput(int $nbColor, int $codeSize)
{
    $validInput = false;
    while (!$validInput) {
        echo "Enter your guess (e.g., ABCD): ";
        $attempt = strtoupper(trim(fgets(STDIN)));
        if (preg_match("/^[A-Z]{" . $codeSize . "}$/", $attempt)) {
            $validInput = true;
        } else {
            echo "Invalid input. Please enter a valid code.\n";
        }
    }
    return $attempt;
}

/**
 * Check how many correct colors at the good place and correct color at the wrong place
 * are in the attempt
 *
 * @param string $attempt
 * @param string $code
 * @return string // return the result of the attempt as a string
 */
function checkInput(string $attempt, string $code)
{
    $correctPosition = 0;
    $correctColor = 0;
    
    for ($i = 0; $i < strlen($code); $i++) {
        if ($attempt[$i] === $code[$i]) {
            $correctPosition++;
        } elseif (strpos($code, $attempt[$i]) !== false) {
            $correctColor++;
        }
    }
    
    return str_repeat('O', $correctPosition) . str_repeat('X', $correctColor);
}

/**
 * Update the board with the last attempt, the attempts left, and the result of the attempt
 *
 * @param string $attempt
 * @param string $result
 * @param array $board
 * @return array $board updated board with the last attempt
 */
function updateBoard(string $attempt, string $result, array $board)
{
    foreach ($board as $key => $value) {
        if ($value === str_repeat('-', strlen($attempt))) {
            $board[$key] = $attempt . ' ' . $result;
            break;
        }
    }
    
    return $board;
}

/**
 * Display the array of board as a correct board game (with all the attempts)
 *
 * @param array $board
 * @param string $result
 */
function displayBoard(array $board, string $result)
{
    echo "Mastermind Game\n";
    foreach ($board as $row) {
        echo $row . "\n";
    }
    if (!empty($result)) {
        echo "Result: $result\n";
    }
}

/**
 * Check if the number of attempts is equal to 0 OR the last attempt is correct
 *
 * @param integer $nbTry
 * @param string $result
 * @return integer $final = 0 game continues, = 1 game won, = 2 game lost
 */
function checkWin(int $nbTry, string $result)
{
    if ($result === str_repeat('C', strlen($result))) {
        return 1; // Game won
    } elseif ($nbTry === 1) {
        return 2; // Game lost
    } else {
        return 0; // Game continues
    }
}

/**
 * Function called at the exit of the game loop, echo win or lose
 *
 * @param integer $final
 */
function endGame(int $final)
{
    if ($final === 1) {
        echo "Congratulations! You won!\n";
    } else {
        echo "Sorry, you lost. The secret code was not cracked.\n";
    }
}

// Start the game
[$board, $nbColor, $code, $nbTry, $codeSize] = init();
run($board, $nbColor, $code, $nbTry, $codeSize);

?>
