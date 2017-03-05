<?php
/**
 * @link      http://github.com/zetta-repo/zend-pagseguro for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\ZendPagSeguro\Form;

use Zend\Form\Form;

class CreditCardForm extends Form
{
    /**
     * CreditCardForm constructor.
     * @param string $name
     * @param array $options
     */
    public function __construct($name = 'credit-card', array $options = [])
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');

        $this->add([
            'name' => 'number',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-number',
                'class' => 'form-control mask-credit-card',
                'placeholder' => _('Card Number'),
                'required' => true
            ],
            'options' => [
                'label' => _('Card Number'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'cvv',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-cvv',
                'class' => 'form-control',
                'placeholder' => _('CVV'),
                'required' => true
            ],
            'options' => [
                'label' => _('CVV'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'expirationMonth',
            'type' => 'select',
            'attributes' => [
                'id' => $name . '-expirationMonth',
                'class' => 'form-control',
                'required' => true
            ],
            'options' => [
                'label' => _('Expiration Month'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
                'empty_option' => _('Month'),
                'value_options' => [
                     1 => _('01 - Janeiro'),
                     2 => _('02 - Fevereiro'),
                     3 => _('03 - Março'),
                     4 => _('04 - Abril'),
                     5 => _('05 - Maio'),
                     6 => _('06 - Junho'),
                     7 => _('07 - Julho'),
                     8 => _('08 - Agosto'),
                     9 => _('09 - Setembro'),
                    10 => _('10 - Outubro'),
                    11 => _('11 - Novembro'),
                    12 => _('12 - Dezembro')
                ]
            ],
        ]);

        $this->add([
            'name' => 'expirationYear',
            'type' => 'select',
            'attributes' => [
                'id' => $name . '-expirationYear',
                'class' => 'form-control',
                'required' => true
            ],
            'options' => [
                'label' => _('Expiration Year'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
                'empty_option' => _('Year')
            ],
        ]);

        $this->add([
            'name' => 'holderName',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-holderName',
                'class' => 'form-control',
                'placeholder' => _('Holder Name'),
                'required' => true
            ],
            'options' => [
                'label' => _('Holder Name'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'holderCpf',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-holderCpf',
                'class' => 'form-control mask-cpf',
                'placeholder' => _('Holder CPF'),
                'required' => true
            ],
            'options' => [
                'label' => _('Holder CPF'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'holderBirthday',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-holderBirthday',
                'class' => 'form-control mask-date',
                'placeholder' => _('Holder Birthday'),
                'required' => true
            ],
            'options' => [
                'label' => _('Holder Birthday'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'holderPhone',
            'type' => 'text',
            'attributes' => [
                'id' => $name . '-holderPhone',
                'class' => 'form-control mask-phone',
                'placeholder' => _('Holder Phone'),
                'required' => true
            ],
            'options' => [
                'label' => _('Holder Phone'),
                'label_attributes' => ['class' => 'control-label'],
                'div' => ['class' => 'form-group', 'class_error' => 'has-error'],
            ],
        ]);

        $this->add([
            'name' => 'submitButton',
            'type' => 'button',
            'attributes' => [
                'class' => 'btn btn-sm btn-primary pagamento-submit',
                'id' => $name . '-submitButton',
            ],
            'options' => [
                'label' => _('Make Payment'),
            ]
        ]);
    }
}