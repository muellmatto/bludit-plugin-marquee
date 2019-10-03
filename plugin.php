<?php

class treadmill extends Plugin {

    public function init() {
        $this->dbFields = array(
            'text'=>'',
            'duration'=>'25'
        );
        // make $treadmill object available in themes
        global $treadmill;
        $treadmill = $this;
    }

    public function get() {
        // returns treadmill html code
        $html =  '<style>';
        $html .= '.scrollText {';
        $html .= ' padding-left: 100%; ';
        $html .= ' animation-name: scrolly;';
        $html .= ' animation-duration:';
        $html .= $this->getValue('duration');
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
        $html .= str_replace( PHP_EOL, ' &emsp; ', $this->getValue('text'));
        $html .= '</p>';

        return $html;
    }

    public function form() {
        
		global $L;

        $html = '<div>';
        $html .= '<label>'.$L->get('scroll-text').'</label>';
        $html .= '<textarea name="text" id="jstext">'.$this->getValue('text').'</textarea>';
        $html .= '</div>';
        $html .= '<div>';
        $html .= '<label>'.$L->get('duration-text').'</label>';
        $html .= '<input type="number" name="duration" min="1" value="';
        $html .= $this->getValue('duration');
        $html .= '">';
        $html .= '</div>';

        return $html;
    }
}

?>
