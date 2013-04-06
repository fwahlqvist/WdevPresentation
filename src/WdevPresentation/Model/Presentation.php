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
    protected $inputFilter;    
    
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->title = (isset($data['title'])) ? $data['title'] : null;
        $this->content  = (isset($data['content'])) ? $data['content'] : null;
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
                /*'filters'  => array(
                    array('name' => 'StripTags',
                        'options' => array(
                            'allowTags' => array('p','strong','em','u','h1','h2','h3','h4','h5','h6','img','li','ol','ul','span','div','br','ins','del', 'a','pre', '<!--', '-->', 'section', 'aside', 'script', 'small', 'code', 'blockquote', 'iframe', 'form'),
                            'allowAttribs' => array('href', 'title', 'src', 'class','width', 'height', 'type', 'id', 'data-state','contenteditable', 'cite', 'target', 'action', 'src'),
                        )),
                    array('name' => 'StringTrim'),
                ),*/
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

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
    