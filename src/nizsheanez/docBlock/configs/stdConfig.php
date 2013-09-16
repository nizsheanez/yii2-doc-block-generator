<?php
return array(
    //change it if you would process some other files
    'filesIterator'           => 'ModelInModuleFilesIterator',
    //change it if you would scope only some specific classes, based on this
    'baseClass'               => 'CComponent',
    //iterator by object properties, you can hide some set
    'propertyIteratorOptions' => array(
        'class'                   => 'YiiComponentPropertyIterator',
        'commentLanguage'         => 'ru',
        'commentCategory'         => 'core',
        'addIllustrationCommetns' => true,
        //allow values: 'attributes', 'events', 'accessors', 'relations'
        'generatePropertiesFor'   => array(
            'attributes',
            'accessors',
            'relations',
        ),
        //allow values: 'scopes'
        'generateMethodsFor'      => array(
            'scopes'
        ),
        //some settings for @property annotation
        'propertyOptions'         => array(
            'class'                     => 'YiiComponentProperty',
            'toUnderscore'              => false,
            //use or not @property-write/@property-read annotations
            'readWriteDifferentiate'    => false,
            'tagVerticalAlignment'      => true,
            'typeVerticalAlignment'     => true,
            'propertyVerticalAlignment' => true
        ),
        //some settings for @method annotation
        'methodOptions'           => array(
            'class'                     => 'YiiComponentMethod',
            'toUnderscore'              => false,
            'tagVerticalAlignment'      => true,
            'typeVerticalAlignment'     => true,
            'propertyVerticalAlignment' => true
        ),
    ),
    'messageSource'           => array(
        'class'    => 'CPhpMessageSource',
        'basePath' => Yii::getPathOfAlias($this['alias'] . '.messages')
    )
);