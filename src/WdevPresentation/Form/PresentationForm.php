<?php
namespace WdevPresentation\Form;

use Zend\Form\Form;

class PresentationForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('presentation');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'type'  => 'hidden',
            'attributes' => array(
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'type'  => 'text',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));
        $this->add(array(
            'name' => 'content',
            'type'  => 'textarea',
            'attributes' => array(
                'cols' => '100',
                'rows' => '20',
                'value' => '<div class="reveal">
                                <div class="slides">
                                    <section>Single Horizontal Slide</section>
                                    <section>
                                        <section>Vertical Slide 1</section>
                                        <section>Vertical Slide 2</section>
                                    </section>
                                </div>
                            </div>'
            ),
            'options' => array(
                'label' => 'Content',
            ),
        ));
        
        $this->add(array(
            'name' => 'private',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Private',
            ),
        ));
        
        $this->add(array(
            'name' => 'theme',
            'type' => 'text',
            'attributes' => array(
                'list' => 'themes',
                'placeholder' => 'default, beige, sky, night, serif, simple',
                'value' => 'default',
            ),
            'options' => array(
                'label' => 'Theme',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'controls',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Controls',
            ),
        ));
        
        $this->add(array(
            'name' => 'progress',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Progress',
            ),
        ));
           
        $this->add(array(
            'name' => 'history',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'History',
            ),
        ));
        
        $this->add(array(
            'name' => 'center',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Center',
            ),
        ));
        
        $this->add(array(
            'name' => 'autoSlide',
            'type' => 'text',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Auto Slide',
            ),
        ));
            
        $this->add(array(
            'name' => 'keyboard',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Keyboard',
            ),
        ));
            
        $this->add(array(
            'name' => 'overview',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Overview',
            ),
        ));
        
        $this->add(array(
            'name' => 'looop',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Loop',
            ),
        ));
        
        $this->add(array(
            'name' => 'rtl',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'RTL',
            ),
        ));
            
        $this->add(array(
            'name' => 'mouseWeel',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Mouse Weel',
            ),
        ));
        
        $this->add(array(
            'name' => 'rollingLinks',
            'type' => 'Checkbox',
            'attributes' => array(
            ),
            'options' => array(
                'label' => 'Rolling Links',
            ),
        ));
        
        $this->add(array(
            'name' => 'transition',
            'type' => 'Select',
            'attributes' => array(
                'options' => array(
                    'default' =>'Default',
                    'cube' => 'Cube',
                    'page' => 'Page',
                    'concave' => 'Concave',
                    'zoom' => 'Zoom',
                    'linear' => 'Linear',
                    'fade' => 'Fade',
                    'none' => 'None',
                ),
            ),
            'options' => array(
                'label' => 'Transition',
            ),
        ));
            
        $this->add(array(
            'name' => 'presetationWidth',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => '960',
            ),
            'options' => array(
                'label' => 'Presentation Width',
            ),
        ));
        
        $this->add(array(
            'name' => 'presentationHeight',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => '700',
            ),
            'options' => array(
                'label' => 'Presentation Height',
            ),
        ));
        
        $this->add(array(
            'name' => 'presentationUnit',
            'type' => 'Select',
            'attributes' => array(
                'options' => array(
                    'pixels' =>'Pixels',
                    'percentage' => 'Percentage',
                ),
            ),
            'options' => array(
                'label' => 'Presentation Unit',
            ),
        ));
        
        $this->add(array(
            'name' => 'presentationMargin',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => '0.1',
            ),
            'options' => array(
                'label' => 'Presenation Margin',
            ),
        ));
        
        $this->add(array(
            'name' => 'presentationMinScale',
            'type' => 'text',
            'attributes' => array( 
                'placeholder' => '0.2',
            ),
            'options' => array(
                'label' => 'Presentation Min Scale',
            ),
        ));
        
        $this->add(array(
            'name' => 'presentationMaxScale',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => '1.0',
            ),
            'options' => array(
                'label' => 'Presentation Max Scale',
            ),
        ));
        
        $this->add(array(
            'name' => 'multiplexId',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => 'e3ea5543b7e6bb65',
            ),
            'options' => array(
                'label' => 'Multiplex ID',
            ),
        ));
        
        $this->add(array(
            'name' => 'multiplexSecret',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => '12345678910111213',
            ),
            'options' => array(
                'label' => 'Multiplex Secret',
            ),
        ));
        
        $this->add(array(
            'name' => 'multiplexUrl',
            'type' => 'Url',
            'attributes' => array(
                'placeholder' => 'http://wahlqvist.co.uk',
            ),
            'options' => array(
                'label' => 'multiplexUrl',
            ),
        ));
        
        $this->add(array(
            'name' => 'timestamp',
            'type' => 'hidden',
            'attributes' => array(
            ),
        ));
            
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}