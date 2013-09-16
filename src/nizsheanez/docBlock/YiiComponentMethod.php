<?php
/**
 * Know all about CComponent, CModel, CActiveRecord and etc.
 */
class YiiComponentMethod extends DocBlockLine
{

    public $tag = 'method';


    public function afterPopulate()
    {
    }

    public function canDraw()
    {
        return true;
    }

    /**
     * @return string combined doc string
     */
    public function __toString()
    {
        try
        {
            $type = $this->type ? $this->type : $this->oldType;
            $comment = $this->comment ? $this->comment : $this->oldComment;
            return $this->getLine($this->tag, $type, $this->name . '()' , $comment);

        } catch (Exception $e)
        {
            Yii::app()->handleException($e);
        }
    }


    /**
     * Fill himself by $object properties
     *
     * @param $object
     */
    public function populate($object)
    {
        $this->setTypeAndComment($object);

        if (method_exists($object, 'behaviors'))
        {
            foreach ($object->behaviors() as $id => $data)
            {
                $this->populate($object->asa($id));
            }
        }
    }


    public function getTagLen()
    {
        return strlen($this->tag);
    }


    public function getNameLen()
    {
        return strlen($this->name);
    }


    public function getTypeLen()
    {
        return strlen($this->type);
    }


    /**
     * Parse existing comments for searching types or comments for property
     *
     * @param CComponent $object
     */
    public function setTypeAndComment(CComponent $object)
    {
        if ($object instanceof CActiveRecord)
        {
            $scopes = $object->scopes();
            if (isset($scopes[$this->name]))
            {
                $this->type = get_class($object);
            }
        }
    }



    public function setOldValues($object)
    {
        parent::_setOldValues(DocBlockParser::parseClass($object)->methods);
    }
}
