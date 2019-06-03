<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Article;
use Doctrine\ORM\EntityRepository;

class ContactType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nom', TextType::class, array(
                    'label' => 'Votre nom :',
                    'attr' => array(
                        'placeholder' => 'Votre nom svp !',
                        'class' => 'form-control'),
                    'constraints' => [new NotBlank()],
                ))
                ->add('email', EmailType::class, array(
                    'label' => 'Votre email svp',
                    'attr' => array(
                    'class' => 'form-control'
                )))
                ->add('sujet')
                ->add('commentaire', TextareaType::class, array(
                    'label' => 'Votre message',
                    'attr' => array(
                    'class' => 'form-control'
                )))
                /* ->add('article', EntityType::class, array(
                  'class' => Article::class,
                  'choice_label' => 'nom',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('a')
                  ->where('a.auteur = :auteur')
                  ->setParameter('auteur', 'bob');
                  }
                  )) */
                ->add('submit', SubmitType::class, array(
                    'label' => 'Enregistrer',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }

}
