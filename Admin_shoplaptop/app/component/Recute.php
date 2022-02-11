<?php

namespace App\component;
class Recute{
    private $data;
    private $Htmlopect;
    public function __construct($data)
    {
        $this->data= $data;
    }

    public function returnproducttype($parent_Id,$id=0, $text ='')
    {
        foreach($this->data as $value)
        {
            if($value['parent_id']==$id)
            {
                if(!empty($parent_Id)&& $parent_Id==$value['id'])
              {

              $this->Htmlopect .= "<option selected value ='".$value['id']."'>".$text.$value['name'].'</option>';
            }  
               else 
                   $this->Htmlopect .= '<option  value ='.$value['id'].'>'.$text.$value['name'].'</option>';
          
                   $this->returnproducttype($parent_Id, $value['id'], text: $text.'-');
        
        }
    }
        return $this->Htmlopect;
}
}