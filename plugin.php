<?php

class treadmill extends Plugin {

    public function init() {
        $this->dbFields = array(
            'text'=>'',
            'duration'=>'25'
        );
    }

    public function get() {

        $html =  '<style>';
        $html .= '.scrollText {';
        $html .= ' padding-left: 100%; ';
        // $html .= ' animation: scrolly 4s linear infinite;';
        $html .= ' animation-name: scrolly;';
        $html .= ' animation-duration:';
        $html .= $this->getDbField('duration');
        $html .= 's;';
        $html .= ' animation-timing-function: linear;';
        $html .= ' animation-iteration-count: infinite;';
        $html .= ' white-space: nowrap;';
        $html .= ' display: inline-block;';
        $html .= '}';
        $html .= ' @keyframes scrolly {';
        $html .= ' 0%   { transform: translate(0, 0); }';
        $html .= ' 100% { transform: translate(-100%,0); }';
        $html .= '}';
        $html .= '</style>';
        $html .= '';
        $html .= '<p class="scrollText">';
        $html .= $this->getDbField('text');
        $html .= '</p>';

        return $html;
    
    }

    public function form() {
        
		global $Language;

        $html = '<div>';
        $html .= '<label>'.$Language->get('scroll-text').'</label>';
        $html .= '<textarea name="text" id="jstext">'.$this->getDbField('text').'</textarea>';
        $html .= '</div>';
        $html .= '<div>';
        $html .= '<label>'.$Language->get('duration-text').'</label>';
        $html .= '<input type="number" name="duration" min="1" value="';
        $html .= $this->getDbField('duration');
        $html .= '">';
        $html .= '</div>';

        return $html;
    }

    public function siteBodyBegin() {
        // return $this->get();
    }
    public function siteBodyEnd() {
        // return $this->get();
    }
    public function pageBegin() {
        // return $this->get();
    }
    public function pageEnd() {
        // return $this->get();
    }
    public function postBegin() {
        // return $this->get();
    }
    public function postEnd() {
        // return $this->get();
    }
}

?>
