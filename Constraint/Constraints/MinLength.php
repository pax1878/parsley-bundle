<?php

namespace JBen87\ParsleyBundle\Constraint\Constraints;

use JBen87\ParsleyBundle\Constraint\Constraint;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MinLength extends Constraint
{
    /**
     * @var int
     */
    private $min;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);

        $this->min = $options['min'];
    }

    /**
     * @inheritdoc
     */
    protected function getAttribute(): string
    {
        return 'data-parsley-minlength';
    }

    /**
     * @inheritdoc
     */
    protected function getValue(): string
    {
        return (string) $this->min;
    }

    /**
     * @inheritdoc
     */
    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired(['min'])
            ->setAllowedTypes('min', ['int'])
        ;
    }
}
