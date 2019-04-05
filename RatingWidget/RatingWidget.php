<?php

/**
 * RatingWidget
 *
 * @author   Ahadzade Miraga <miraga.ehedzade@gmail.com>
 * $readOnly boolean;
 * $value starCount;
 * $ajaxUrl for adding rating count
 **/
class RatingWidget  extends CWidget
{
    public $value;
    public $readOnly;
    public $eduMatID; 
    public $ajaxUrl; 
    
    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $baseDir = dirname(__FILE__);
        $assets = Yii::app()->getAssetManager()->publish($baseDir.DIRECTORY_SEPARATOR.'assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets.'/css/font-awesome.min.css');
        $cs->registerCssFile($assets.'/css/style.css');  
          
        if($this->readOnly)
        {
            $countStars = round($this->value);
            $countRemainingStars = 5 - $countStars;
            
            $starIcons = '';
            $starRemainingIcons = '';
            
            for($i=1;$i<=$countStars;$i++)
            {
                $starIcons .= '<a class="fa fa-star active nohover"></a>';
            }
            
            for($j=1;$j<=$countRemainingStars;$j++)
            {
                $starRemainingIcons .= '<a class="fa fa-star-o nohover"></a>';
            }
            echo "<div class='rating'>".$starIcons.$starRemainingIcons."</div>";
            
        }  
        else
        {
            $starWithHoverIcons = '';
            for($k=1;$k<=5;$k++)
            {
                $starWithHoverIcons .= '<i class="fa fa-star-o withHover" data-id="'.$k.'"></i>';
            }
            echo "<div class='all_stars'>".$starWithHoverIcons."</div>";
        }
        
        
        
        Yii::app()->clientScript->registerScript('setVar' , 
            'var ajaxUrl = "'.$this->ajaxUrl.'"
             var eduMatID = "'.$this->eduMatID.'"   
         ', CClientScript::POS_BEGIN);
        
        $cs->registerScriptFile($assets.'/js/rating.js', CClientScript::POS_END);
        
        
        
         
    }

}
?>