<?php

declare(strict_types=1);

namespace Tests\Synolia\SyliusMailTesterPlugin\Behat\Page\Admin\MailTester;

use Behat\Mink\Element\NodeElement;
use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

final class IndexPage extends BaseIndexPage implements IndexPageInterface
{
    public function getField(string $field): ?NodeElement
    {
        return $this->getDocument()->findField($field);
    }

    /** @return string|bool|array */
    public function getFieldValue(string $field)
    {
        return $this->getDocument()->findField($field)->getValue();
    }

    public function getSelectorHtml(string $field): string
    {
        return $this->getDocument()->findField($field)->getOuterHtml();
    }

    public function writeInField(string $text, string $field): ?NodeElement
    {
        $field = $this->getDocument()->findField($field);
        $field->setValue($text);

        return $field;
    }

    public function changeSelectValue(string $value, string $select): void
    {
        $field = $this->getDocument()->findField($select);
        $field->selectOption($value);
    }

    public function pressButton(string $field): void
    {
        $this->getDocument()->pressButton($field);
    }
}
