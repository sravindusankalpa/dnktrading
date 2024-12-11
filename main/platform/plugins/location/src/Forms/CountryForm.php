<?php

namespace Botble\Location\Forms;

use Botble\Base\Forms\FieldOptions\IsDefaultFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\SortOrderFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Location\Http\Requests\CountryRequest;
use Botble\Location\Models\Country;

class CountryForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(Country::class)
            ->setValidatorClass(CountryRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required())
            ->add('code', TextField::class, [
                'label' => trans('plugins/location::country.code'),
                'attr' => [
                    'placeholder' => trans('plugins/location::country.code_placeholder'),
                    'data-counter' => 10,
                ],
                'help_block' => [
                    'text' => trans('plugins/location::country.code_helper'),
                ],
            ])
            ->add('nationality', TextField::class, [
                'label' => trans('plugins/location::country.nationality'),
                'attr' => [
                    'placeholder' => trans('plugins/location::country.nationality'),
                    'data-counter' => 120,
                ],
            ])
            ->add('order', NumberField::class, SortOrderFieldOption::make())
            ->add('is_default', OnOffField::class, IsDefaultFieldOption::make())
            ->add('status', SelectField::class, StatusFieldOption::make())
            ->add('image', MediaImageField::class, MediaImageFieldOption::make())
            ->setBreakFieldPoint('status');
    }
}