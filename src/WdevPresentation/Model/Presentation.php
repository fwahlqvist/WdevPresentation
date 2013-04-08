<?php
namespace WdevPresentation\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Presentation implements InputFilterAwareInterface
{
    public $id;
    public $title;
    public $content;
    public $private;
    public $theme;
    public $controls;
    public $history;
    public $center;
    public $autoSlide;
    public $keyboard;
    public $overview;
    public $looop;
    public $rtl;
    public $mouseWeel;
    public $rollingLinks;
    public $transition;
    public $presetationWidth;
    public $presentationHeight;
    public $presentationUnit;
    public $presentationMargin;
    public $presentationMinScale;
    public $presentationMaxScale;
    public $multiplexId;
    public $multiplexSecret;
    public $multiplexUrl;
    public $timestamp;
    
    
    protected $inputFilter;    
    
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->content  = (isset($data['content'])) ? $data['content'] : null;
        $this->private  = (isset($data['private'])) ? $data['private'] : null;
        $this->theme  = (isset($data['theme'])) ? $data['theme'] : null;
        $this->controls  = (isset($data['controls'])) ? $data['controls'] : null;
        $this->progress  = (isset($data['progress'])) ? $data['progress'] : null;
        $this->history  = (isset($data['history'])) ? $data['history'] : null;
        $this->center  = (isset($data['center'])) ? $data['center'] : null;
        $this->autoSlide  = (isset($data['autoSlide'])) ? $data['autoSlide'] : null;
        $this->keyboard  = (isset($data['keyboard'])) ? $data['keyboard'] : null;
        $this->overview  = (isset($data['overview'])) ? $data['overview'] : null;
        $this->looop  = (isset($data['looop'])) ? $data['looop'] : null;
        $this->rtl  = (isset($data['rtl'])) ? $data['rtl'] : null;
        $this->mouseWeel  = (isset($data['mouseWeel'])) ? $data['mouseWeel'] : null;
        $this->rollingLinks  = (isset($data['rollingLinks'])) ? $data['rollingLinks'] : null;
        $this->transition  = (isset($data['transition'])) ? $data['transition'] : null;
        $this->presetationWidth  = (isset($data['presetationWidth'])) ? $data['presetationWidth'] : null;
        $this->presentationHeight  = (isset($data['presentationHeight'])) ? $data['presentationHeight'] : null;
        $this->presentationUnit  = (isset($data['presentationUnit'])) ? $data['presentationUnit'] : null;
        $this->presentationMargin  = (isset($data['presentationMargin'])) ? $data['presentationMargin'] : null;
        $this->presentationMinScale  = (isset($data['presentationMinScale'])) ? $data['presentationMinScale'] : null;
        $this->presentationMaxScale  = (isset($data['presentationMaxScale'])) ? $data['presentationMaxScale'] : null;
        $this->multiplexId  = (isset($data['multiplexId'])) ? $data['multiplexId'] : null;
        $this->multiplexSecret  = (isset($data['multiplexSecret'])) ? $data['multiplexSecret'] : null;
        $this->multiplexUrl  = (isset($data['multiplexUrl'])) ? $data['multiplexUrl'] : null;
        $this->timestamp  = (isset($data['timestamp'])) ? $data['timestamp'] : null;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'title',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'content',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags',
                        'options' => array(
                            'allowTags' => array('p','strong','em','u','h1','h2','h3','h4','h5','h6','img','li','ol','ul','span','div','br','ins','del', 'a','pre', '<!--', '-->', 'section', 'aside', 'script', 'small', 'code', 'blockquote', 'quote', 'iframe', 'form', 'table', 'tr', 'th', 'td', ),
                            'allowAttribs' => array('href', 'title', 'src', 'class','width', 'height', 'type', 'id', 'data-state','contenteditable', 'cite', 'target', 'action', 'src'),
                        )),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 25500,
                        ),
                    ),
                ),
            )));
            
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'private',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
                
                
            $inputFilter->add($factory->createInput(array(
                'name' => 'theme',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'controls',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'progress',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
       
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'history',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
        
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'center',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
        
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'autoSlide',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 9999999999,
                        ),
                    ),
                ),
            )));
        
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'keyboard',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'overview',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'looop',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'rtl',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'mouseWeel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'rollingLinks',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
        
            $inputFilter->add($factory->createInput(array(
                'name' => 'transition',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'presentationWidth',
                'filters'  => array(
                    array('name' => 'Int',
                    ),
                ),
            )));
        
            $inputFilter->add($factory->createInput(array(
                'name'  => 'presentationHeight',
                'filters'  => array(
                    array('name' => 'Int'
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'presentationUnit',
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 10,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'presentationMargin',
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 4,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'presentationMinScale',
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'presentationMaxScale',
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'multiplexSecret',
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name'  => 'multiplexId',
                'filters'  => array(
                    array('name' => 'Int',
                        'options' => array( 
                        'min' => 0, 
                        'max' => 1,
                        ),
                    ),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'multiplexUrl',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            )));
        
            
            

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
    