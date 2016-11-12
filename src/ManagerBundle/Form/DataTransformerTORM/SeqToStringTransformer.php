<?php

namespace ManagerBundle\Form\DataTransformer;

use \PropelObjectCollection;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use ManagerBundle\Entity\PMSeq;

class SeqToStringTransformer implements DataTransformerInterface
{
    public function transform($books)
    {


        if (!$books instanceof PropelObjectCollection) {
          //  throw new UnexpectedTypeException($books, '\PropelObjectCollection');
        }
        $idsArray = array();
        foreach ($books as $book) {
           // $idsArray[] = $book->getId();
        }
        $ids = implode(",", $idsArray);
        return array(1,2,3);
    }

    public function reverseTransform($ids)
    {
        /*
        $books = new PropelObjectCollection();

        if ('' === $ids || null === $ids) {
            return $books;
        }

        if (!is_string($ids)) {
           // throw new UnexpectedTypeException($ids, 'string');
        }
        $idsArray = explode(",", $ids);
        $idsArray = array_filter ($idsArray, 'is_numeric');
        foreach ($idsArray as $id) {
            $books->append(BookQuery::create()->findOneById($id));
        }
        return $books;
        */
    }
}