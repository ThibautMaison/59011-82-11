<?php

    /**
     * contient toutes les fonction qui entre les parametre du jeu
     *
     * @return array
     */
    function init(){}
    /**
     * saisir le nombre de caracter dans la suite
     *
     * @return int
     */
    function saisirLongSuite(){}
    /**
     * saisir le nombre de caracter dans la suite
     *
     * @return int
     */
    function saisirNbPosibilite(){}
    /**
     * genere une suite de la longueur en parametre
     *
     * @param integer $longSuite
     * @return string 
     */
    function genereSuite(int $longSuite, int $nbPosibilite){}
    /**
     * contient la boucle de jeu
     *
     * @param integer $nbJoueur
     * @param array $suite
     * @return int
     */
    function jeu(string $suite,int $nbPosibilite){}
    /**
     * saisir une suite
     *
     * @return string suitePropose
     */
    function saisirSuitePropose(string $longSuite,int $nbPosibilite){}
    /**
     * affiche toute les suite proposer et les indices 
     *
     * @param array $tabSuitePropos
     * @param array $tabIndice
     * @return void
     */
    function affichage(array $tabSuitePropos,array $tabIndice){}
    /**
     * verifie si la suite proposer est gagnante
     *
     * @param array $tabSuitePropos
     * @param array $tabIndice
     * @return bool
     */
    function estGagnant(string $suitePropos,string $suite){}
    /**
     *genere un indice en fonction de la suite proposer et de la suite a trouver
     *
     * @param string $suitePropos
     * @param string $suite
     * @return string 
     */
    function genereIndice(string $suitePropos,string $suite){}
    /**
     * affiche le message de fin avec le nombre de tour effectuer
     * @param int $nbTours nombre de tours effectuer
     * @return void
     */
    function fin($nbTours){}




