<?php
namespace Training\CurrencyPrice\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Framework\Phrase;
use Magento\Framework\Stdlib\ArrayManager;
use Magento\Catalog\Ui\Component\Listing\Columns\Price;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Framework\Locale\CurrencyInterface;
use Magento\Catalog\Model\Locator\LocatorInterface;

class Fields extends AbstractModifier
{
    private $locator;

    public function __construct(
        LocatorInterface $locator
    ) {
        $this->locator = $locator;
    }

    public function modifyData(array $data)
    {
        $product   = $this->locator->getProduct();
        $productId = $product->getId();
        $data = array_replace_recursive(
            $data, [
                $productId => [
                    'currency'
                ]
            ]
        );
        return $data;
    }

    public function modifyMeta(array $meta)
    {
        $fields = $this->getFields();

        $meta = array_replace_recursive(
            $meta,
            [
                'currency' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Set Product Currency Price'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.currency',
                                'sortOrder' => 10
                            ],
                        ],
                    ],
                    'children' => $fields
                ],
            ]
        );



        return $meta;
    }

    protected function getFields()
    {
        return [
            'CurrencyPrice' => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label' => __('CurrencyPrice'),
                            'componentType' => Field::NAME,
                            'formElement' => Input::NAME,
                            'dataScope' => 'decimal',
                            'dataType' => Text::NAME,
                            'sortOrder' => 20
                        ],
                    ],
                ],
            ]
        ];
    }

}
