<?php
/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 28-Feb-16
 * Time: 10:33
 */
Yii::import('zii.widgets.CBreadcrumbs');

class EBreadcrumbs extends CBreadcrumbs {
    public $activeLinkTemplate = '<li><a href="{url}">{label}</a></li>';
    public $inactiveLinkTemplate = '<li class="active">{label}</li>';
    public $breadcrumbLabelTemplate = '<li>{label}</i></li>';
    public $breadcrumbLabel = 'You are here';
    /**
     * Renders the content of the portlet.
     */
    public function run() {

        if(empty($this->links))
            return;

        $definedLinks = $this->links;

        echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
        //echo Chtml::openTag('ol',array('class'=>'breadcrumb'))."\n";
        $links=array();
        //$links[] = str_replace('{label}', $this->breadcrumbLabel, $this->breadcrumbLabelTemplate);
        if($this->homeLink===null)
            $definedLinks=array('<i class="fa fa-home"></i>Beranda' => Yii::app()->homeUrl)+$definedLinks;
        elseif($this->homeLink!==false)
            $links[]=$this->homeLink;
        foreach($definedLinks as $label=>$url)
        {
            if(is_string($label) || is_array($url))
                $links[]=strtr($this->activeLinkTemplate,array(
                    '{url}'=>CHtml::normalizeUrl($url),
                    '{label}'=>$this->encodeLabel ? CHtml::encode($label) : $label,
                ));
            else
                $links[]=str_replace('{label}',$this->encodeLabel ? CHtml::encode($url) : $url,$this->inactiveLinkTemplate);
        }
        echo implode('',$links);
        //echo CHtml::closeTag('ol');
        echo CHtml::closeTag($this->tagName);
    }
}