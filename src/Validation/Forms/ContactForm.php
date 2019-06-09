<?php

namespace App\Validation\Forms;

use App\Validation\BaseForm;
use App\Validation\FormField;
use App\Validation\Types\EmailType;
use App\Validation\Types\Required;
use App\Validation\Types\Phone;
use App\Validation\Types\Length;

/**
 * Contact form validator
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class ContactForm extends BaseForm 
{
    public function __construct()
    {
        $this
            ->add(new FormField(
                'email', 
                [
                    new Required(),
                    new EmailType(),
                ]
            ))
            ->add(new FormField(
                'name',
                [
                    new Required()
                ]
            ))
            ->add(new FormField(
                'phone',
                [
                    new Required(),
                    new Phone()
                ]
            ))
            ->add(new FormField(
                'content',
                [
                    new Required(),
                    new Length(5, 300)
                ]
            ))
        ;
    }
}