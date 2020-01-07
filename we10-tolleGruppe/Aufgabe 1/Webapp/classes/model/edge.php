<?php

    class Edge{

        private $endNote = null;
        private $cost = 0.00;
        private $line = null;

        function __construct($endNote, $cost, $line){
            this.$endNote = $endNote;
            this.$cost = $cost;
            this.$line = $line;
        }

        /**
         * getEndNote
         * @return endnote
         */
        function getEndNote(){
            return this.$endNote;
        }

        /**
         * getCost
         * @return cost
         */
        function getCost(){
            return this.$cost;
        }

        /**
         * getLine
         * @return line
         */
        function getLine(){
            return this.$line;
        }

    }
?>