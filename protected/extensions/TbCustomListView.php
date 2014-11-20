<?php

/**
 * TbCustomListView class file.
 * represents a list view in multiple columns with bootstrap.
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

Yii::import('bootstrap.widgets.TbListView');

class TbCustomListView extends TbListView {
    public $columns = 2;
    public function renderItems() {
        $numColumns = (int) $this->columns; 
        if ($numColumns < 2) {
            parent::renderItems();
            return;
        }
        echo CHtml::openTag($this->itemsTagName, array('class' => $this->itemsCssClass)) . "\n";
        $data = $this->dataProvider->getData();
        if (($n = count($data)) > 0) {
            $span = 12 / $numColumns;
            echo CHtml::openTag('div',array('class'=>'row-fluid'));
            $owner = $this->getOwner();
            $render = $owner instanceof CController ? 'renderPartial' : 'render';            
            foreach ($data as $i => $item) {
                echo CHtml::openTag('div', array('class' => 'span' . $span));
                $data = $this->viewData;
                $data['index'] = $i;
                $data['data'] = $item;
                $data['widget'] = $this;
                $owner->$render($this->itemView, $data);
                echo CHtml::closeTag('div');
                if (($i + 1) % $numColumns == 0) {                    
                    echo CHtml::closeTag('div') . CHtml::openTag('div',array('class'=>'row-fluid'));
                }
            }
            echo CHtml::closeTag('div') ;
        } else {
            $this->renderEmptyText();
        }
        echo CHtml::closeTag($this->itemsTagName);
    }
}
?>