<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ["label" => "Nom"])
            ->add('category', null, ["choice_label" => "name", "label" => "Catégorie"])
            ->add('professional', null, ["choice_label" => "name", "label" => "Professionnel"])
            ->add('slogan', TextType::class, ["label" => "Slogan"])
            ->add('description', TextareaType::class, ["label" => "Description"])
            ->add('price', IntegerType::class, ["label" => "Prix"])
            ->add('serviceType', ChoiceType::class, [
                "choices" => $this->getServiceType(),
                "label" => "Type de prestation"
            ])
            ->add('duration', IntegerType::class, ["label" => "Durée (en minutes)"])
            ->add('intervalTime', IntegerType::class, ["label" => "Délai de reprise (en minutes)"])
            ->add('imageFile', FileType::class, ['required' => false, "label" => "Image"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }

    public function getServiceType()
    {
        $choices = Service::SERVICE_TYPE;
        $output = [];
        foreach ($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
