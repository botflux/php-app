<?php

namespace App\Validation\Forms;

use App\Validation\BaseForm;
use App\Validation\FormField;
use App\Validation\Types\Length;

/**
 * Example form validation
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class ArticleForm extends BaseForm
{
    public function __construct()
    {
        $this->add(
            (new FormField('title', [
                new Length(10, 80)
            ]))
        );
    }    
}