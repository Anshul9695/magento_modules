<?php
 
namespace Magemonkeys\Custompdftab\Helper;
 
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
 
class Data extends AbstractHelper
{
    public function stringToTable($text, $colSeparator = '|', $rowSeparator = '||')
    {
        $rows = explode($rowSeparator, $text);
        if (!$rows) return false;
        $html = '<table>';
        foreach ($rows as $row) {
            if ($row) {
                $html .= '<tr>';
                $columns = explode($colSeparator, $row);
                $w=count($columns);
                foreach ($columns as $column) {
                    $html .= '<td style="width:'. 100/$w .'%">' . $column . '</td>';
                }
                $html .= '</tr>';
            }
        }
        $html .= '</table>';
 
        return $html;
    }
 
    public function applicationsRender($applications,  $separator = "||"){
 
        //echo 'called';exit;
        if(!$applications)
            return;
 
        $html = '';
        $_elements = '';
 
        if(strpos($applications,':') > 0) {
            $_items = explode('.',$applications);
            natcasesort($_items);
            foreach($_items as $_item){
                $_item = explode(':',$_item);
 
                if($_item[0] == '')
                    continue;
 
                $html .= '<ul class="applications">';
                $html .= trim($_item[0]).': ';
                $_elements = @explode($separator,$_item[1]);
 
                foreach ($_elements as $element){
                    $html .= '<li>'.trim($element).'</li>';
                }
                $html .= '</ul>';
            }
        } else {
            $html .= '<ul class="applications">';
            $_items = explode($separator,$applications);
            natcasesort($_items);
            foreach ($_items as $_item){
                $html .= '<li>'.$_item.'</li>';
            }
            $html .= '</ul>';
        }
 
        return $html;
 
    }
}