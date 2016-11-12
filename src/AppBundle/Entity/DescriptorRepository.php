<?php

namespace AppBundle\Entity;
use AppBundle\AppBundle;
use Doctrine\ORM\Query\ResultSetMapping;
/**
 * DescriptorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DescriptorRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByLabelAndCategoryWithSynonym($label, $category)
    {

        $sql = "SELECT
                *
                FROM descriptor
            WHERE label LIKE :label AND category = $category

            ";

        $sql = "
       SELECT DISTINCT(id),label,category,count(DISTINCT(bd.breakdown_id)) as breakdownCount FROM (
                SELECT d.id as id , d.label as label , d.category as category , NULL as syn FROM descriptor d WHERE d.label LIKE :label
                UNION ALL
                SELECT s.descriptor as id, (SELECT label FROM descriptor WHERE id=s.descriptor) as label , (SELECT category FROM descriptor WHERE id=s.descriptor) as category , s.label as syn   FROM synonym s WHERE s.label LIKE :label
            ) tot
            LEFT JOIN
            breakdowns_descriptors as bd ON bd.descriptor_id=tot.id


            GROUP BY tot.id
            HAVING breakdownCount >= 0 AND category = :category
            ORDER BY breakdownCount DESC
        ";
        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('label', 'label');
        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('label', "$label");
        $query->setParameter('category', $category);
        return $query->getScalarResult();
    }

    public function findOneByLabelAndCategoryWithSynonym($label, $category)
    {

        $sql = "SELECT DISTINCT(id),label,category,count(DISTINCT(bd.breakdown_id)) as breakdownCount FROM (
                SELECT d.id as id , d.label as label , d.category as category , NULL as syn FROM descriptor d WHERE d.label LIKE :label
                UNION ALL
                SELECT s.descriptor as id, (SELECT label FROM descriptor WHERE id=s.descriptor) as label , (SELECT category FROM descriptor WHERE id=s.descriptor) as category , s.label as syn   FROM synonym s WHERE s.label LIKE :label
            ) tot
            LEFT JOIN
            breakdowns_descriptors as bd ON bd.descriptor_id=tot.id


            GROUP BY tot.id
            HAVING breakdownCount > 0 AND category = :category
            ORDER BY breakdownCount DESC
                ";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('label', 'label');
        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('label', "$label");
        $query->setParameter('category', $category);
        return $query->getScalarResult();
    }

    public function findOneByLabelAndCategory($label, $category)
    {

        $sql = "SELECT
                    *
                    FROM descriptor
                WHERE label LIKE :label AND category = $category

                ";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('label', 'label');
        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('label', "$label");
        $query->setParameter('category', $category);
        return $query->getScalarResult();
    }

    public function AnalyzerFindAll($category)
    {

        $sql = "
          select
            d.id as id,
            d.category as category_id,
            d.label as label,
            group_concat(bd.breakdown_id) as breakdowns_list,
            count(bd.breakdown_id) as breakdownCount,
            count(bd.breakdown_id) / (SELECT count(id) FROM breakdown WHERE closed=1)  as percent_occurance
          FROM descriptor d
          left join breakdowns_descriptors bd ON bd.descriptor_id = d.id
          left join breakdown b ON bd.breakdown_id = b.id
          where d.category LIKE :category AND b.closed=1
          group by bd.descriptor_id
          order by breakdownCount desc";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('label', 'label');
        $rsm->addScalarResult('breakdownCount', 'breakdownCount');
        $rsm->addScalarResult('percent_occurance', 'percent_occurance');
        $query = $em->createNativeQuery($sql, $rsm);
        ($category == 0) ? $query->setParameter('category', "%") : $query->setParameter('category', $category);
        return $query->getScalarResult();
    }

    public function AnalyzerFindTree($descriptor, $category)
    {

        $sql = "
          SELECT
id1,
(SELECT count(b.id) FROM breakdowns_descriptors bd LEFT JOIN breakdown b ON b.id=bd.breakdown_id WHERE bd.descriptor_id = id1) as countId1,
(SELECT label FROM descriptor WHERE id = id1) as label1,

id2,
(SELECT count(b.id) FROM breakdowns_descriptors bd LEFT JOIN breakdown b ON b.id=bd.breakdown_id WHERE bd.descriptor_id = id2) as countId2,
(SELECT label FROM descriptor WHERE id = id2) as label2,
(
   SELECT count(b.id)
FROM breakdown b
WHERE b.closed = 1 AND EXISTS (SELECT 1 FROM breakdowns_descriptors bd WHERE b.id = bd.breakdown_id and bd.descriptor_id =id1)
  and EXISTS (SELECT 1 FROM breakdowns_descriptors bd WHERE b.id = bd.breakdown_id and bd.descriptor_id =id2)
) as relationCount
FROM (
    select d1.id as id1,d2.id as id2 from descriptor d1

left  join  descriptor d2 on d1.id != d2.id and d2.category=:category
    where d1.category = 1
    ) s1

    group by id1, id2
    having relationCount > 0 and id1 LIKE :id
ORDER BY relationCount  DESC";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id1', 'id1');
        $rsm->addScalarResult('label1', 'label1');
        $rsm->addScalarResult('countId1', 'countId1');
        $rsm->addScalarResult('id2', 'id2');
        $rsm->addScalarResult('label2', 'label2');
        $rsm->addScalarResult('countId2', 'countId2');
        $rsm->addScalarResult('relationCount', 'relationCount');

        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('id', $descriptor);
        $query->setParameter('category', $category);

        return $query->getScalarResult();
    }

    public function AnalyzerEdges($category)
    {


        $sql = "SELECT
    distinct least(id1,id2) as fromField,
    greatest(id2, id1) as toField,
    (SELECT
            COUNT(b.id)
        FROM
            breakdown b
        WHERE
            b.closed = 1
                AND EXISTS( SELECT
                    1
                FROM
                    breakdowns_descriptors bd
                WHERE
                    b.id = bd.breakdown_id
                        AND bd.descriptor_id = id1)
                AND EXISTS( SELECT
                    1
                FROM
                    breakdowns_descriptors bd
                WHERE
                    b.id = bd.breakdown_id AND b.closed  = 1
                        AND bd.descriptor_id = id2)) AS valueField
FROM
    (SELECT
        d1.id AS id1, d2.id AS id2
    FROM
        descriptor d1
    LEFT JOIN descriptor d2 ON d1.id != d2.id AND d2.category LIKE :category
    WHERE
        d1.category LIKE :category ) s1

HAVING valueField > 0
ORDER BY id1";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('fromField', 'fromField');
        $rsm->addScalarResult('toField', 'toField');
        $rsm->addScalarResult('valueField', 'valueField');

        $query = $em->createNativeQuery($sql, $rsm);

        ($category == 0) ? $query->setParameter('category', "%") : $query->setParameter('category', $category);

        return $query->getScalarResult();
    }

    public function AnalyzerNodes($category)
    {

        $sql = "SELECT
    d.id AS idField,
    d.label AS labelField,
    d.category AS categoryField,
    COUNT(b.id) AS valueField
FROM
    descriptor d
        LEFT JOIN
    breakdowns_descriptors bd ON bd.descriptor_id = d.id
        LEFT JOIN
    breakdown b ON b.id = bd.breakdown_id
WHERE d.category LIKE :category AND b.closed = 1
GROUP BY d.id";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('idField', 'idField');
        $rsm->addScalarResult('labelField', 'labelField');
        $rsm->addScalarResult('valueField', 'valueField');
        $rsm->addScalarResult('categoryField', 'categoryField');

        $query = $em->createNativeQuery($sql, $rsm);

        ($category == 0) ? $query->setParameter('category', "%") : $query->setParameter('category', $category);

        return $query->getScalarResult();
    }


    public function AnalyzerEdges2($category, $start = null, $stop = null, $minDuration = null, $maxDuration = null)
    {

        $categoryIn = array();
        foreach ($category as $cat) {
            array_push($categoryIn, $cat->getId());
        }


        $sql = "SELECT DISTINCT
    LEAST(id1, id2) AS fromField,
    GREATEST(id2, id1) AS toField,
    (SELECT
            COUNT(b.id)
        FROM
            breakdown b
        WHERE
            b.closed = 1
                AND EXISTS( SELECT
                    1
                FROM
                    breakdowns_descriptors bd
                WHERE
                    b.id = bd.breakdown_id
                        AND bd.descriptor_id = id1)
                AND EXISTS( SELECT
                    1
                FROM
                    breakdowns_descriptors bd
                WHERE
                    IF(:minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                        IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                            IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                                (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                                (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
                        AND IF(:start IS NOT NULL AND :stop IS NOT NULL,
                        (b.start BETWEEN :start AND :stop)
                            OR (b.stop BETWEEN :start AND :stop),
                        IF(:start IS NULL AND :stop IS NOT NULL,
                            (b.start <= :stop) OR (b.stop <= :stop),
                            IF(:start IS NOT NULL AND :stop IS NULL,
                                (b.start >= :start)
                                    OR (b.stop >= :start),
                                (b.start >= 0))))
                        AND b.id = bd.breakdown_id
                        AND b.closed = 1
                        AND bd.descriptor_id = id2)) AS valueField
FROM
    (SELECT
        d1.id AS id1, d2.id AS id2
    FROM
        descriptor d1
    LEFT JOIN descriptor d2 ON d1.id != d2.id AND d2.category IN (:category)
    WHERE
        d1.category IN (:category)) s1
HAVING valueField > 0
ORDER BY id1;";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('fromField', 'fromField');
        $rsm->addScalarResult('toField', 'toField');
        $rsm->addScalarResult('valueField', 'valueField');

        $query = $em->createNativeQuery($sql, $rsm);

        $query->setParameter('start', $start);
        $query->setParameter('stop', $stop);
        $query->setParameter('minDuration', $minDuration);
        $query->setParameter('maxDuration', $maxDuration);
        $query->setParameter('category', $categoryIn);

        return $query->getScalarResult();
    }

    public function AnalyzerNodes2($category, $start = null, $stop = null, $minDuration = null, $maxDuration = null)
    {


        $categoryIn = array();
        foreach ($category as $cat) {
            array_push($categoryIn, $cat->getId());
        }


        $sql = "

            SELECT
                d.id AS idField,
                d.label AS labelField,
                d.category AS categoryField,
                COUNT(b.id) AS valueField,
                group_concat(b.id) AS breakdownsField,
                b.start as start,
                b.stop as stop,
                sec_to_time(SUM((TIME_TO_SEC(TIMEDIFF(b.stop, b.start))))) as cumulativeDuration,
                round(100*SUM((TIME_TO_SEC(TIMEDIFF(b.stop, b.start)))) /  (SELECT
            SUM((TIME_TO_SEC(TIMEDIFF(b.stop, b.start))))
        FROM
            breakdown b
        WHERE
            IF(:minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                    IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
                AND IF(:start IS NOT NULL AND :stop IS NOT NULL,
                (b.start BETWEEN :start AND :stop)
                    OR (b.stop BETWEEN :start AND :stop),
                IF(:start IS NULL AND :stop IS NOT NULL,
                    (b.start <= :stop) OR (b.stop <= :stop),
                    IF(:start IS NOT NULL AND :stop IS NULL,
                        (b.start >= :start)
                            OR (b.stop >= :start),
                        (b.start >= 0))))
                AND d.category IN (:category)
                AND b.closed = 1),2) as breakdownLengthRatio
            FROM
                descriptor d
                    LEFT JOIN
                breakdowns_descriptors bd ON bd.descriptor_id = d.id
                    LEFT JOIN
                breakdown b ON b.id = bd.breakdown_id
            WHERE

            IF( :minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                    IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                        IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
            AND

            IF(:start IS NOT NULL AND :stop IS NOT NULL,(b.start BETWEEN :start AND :stop) OR (b.stop BETWEEN :start AND :stop),
                IF(:start IS NULL AND :stop IS NOT NULL, (b.stop <= :stop) ,
                    IF(:start IS NOT NULL AND :stop IS NULL,(b.start >= :start),
                        (b.start >= 0)
                    )
                )
            )
            AND d.category IN (:category)
            AND b.closed = 1
            GROUP BY d.id
            ";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('idField', 'idField');
        $rsm->addScalarResult('labelField', 'labelField');
        $rsm->addScalarResult('valueField', 'valueField');
        $rsm->addScalarResult('categoryField', 'categoryField');
        $rsm->addScalarResult('breakdownsField', 'breakdownsField');
        $rsm->addScalarResult('breakdownLengthRatio', 'breakdownLengthRatio');
        $rsm->addScalarResult('cumulativeDuration', 'cumulativeDuration');

        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('start', $start);
        $query->setParameter('stop', $stop);
        $query->setParameter('minDuration', $minDuration);
        $query->setParameter('maxDuration', $maxDuration);
        $query->setParameter('category', $categoryIn);

        return $query->getScalarResult();
    }

    public function AnalyzerFindAll2($category, $start = null, $stop = null, $minDuration = null, $maxDuration = null)
    {

        $categoryIn = array();
        foreach ($category as $cat) {
            array_push($categoryIn, $cat->getId());
        }

        $sql = "
            SELECT 
                d.id AS id,
                d.category AS category_id,
                d.label AS label,
                GROUP_CONCAT(bd.breakdown_id) AS breakdownsList,
                COUNT(bd.breakdown_id) as breakdownCount,

                round(100 * COUNT(bd.breakdown_id) / (SELECT count(b.id) FROM breakdown b
                    WHERE
                    IF(:minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                    IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                        IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
                    AND IF(:start IS NOT NULL AND :stop IS NOT NULL,
                    (b.start BETWEEN :start AND :stop)
                        OR (b.stop BETWEEN :start AND :stop),
                    IF(:start IS NULL AND :stop IS NOT NULL,
                        (b.start <= :stop) OR (b.stop <= :stop),
                        IF(:start IS NOT NULL AND :stop IS NULL,
                            (b.start >= :start)
                                OR (b.stop >= :start),
                            (b.start >= 0))))
                    AND d.category IN (:category)
                    AND b.closed = 1

                ),2) AS breakdownOccuranceRatio,
                round(100*COUNT(bd.breakdown_id) / (SELECT 
                        COUNT(id)
                    FROM
                        breakdown
                    WHERE
                        closed = 1),2) AS percent_occurance,
                        round(100*SUM((TIME_TO_SEC(TIMEDIFF(b.stop, b.start)))) /  (SELECT 
                        SUM((TIME_TO_SEC(TIMEDIFF(b.stop, b.start))))
                    FROM
                        breakdown b
                    WHERE
                        IF(:minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                            IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                                (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                                IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
                            AND IF(:start IS NOT NULL AND :stop IS NOT NULL,
                            (b.start BETWEEN :start AND :stop)
                                OR (b.stop BETWEEN :start AND :stop),
                            IF(:start IS NULL AND :stop IS NOT NULL,
                                (b.start <= :stop) OR (b.stop <= :stop),
                                IF(:start IS NOT NULL AND :stop IS NULL,
                                    (b.start >= :start)
                                        OR (b.stop >= :start),
                                    (b.start >= 0))))
                            AND d.category IN (:category)
                            AND b.closed = 1),2) as breakdownLengthRatio
            FROM
                descriptor d
                    LEFT JOIN
                breakdowns_descriptors bd ON bd.descriptor_id = d.id
                    LEFT JOIN
                breakdown b ON bd.breakdown_id = b.id
            WHERE
                IF(:minDuration IS NOT NULL AND :maxDuration IS NOT NULL,
                    (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) BETWEEN :minDuration AND :maxDuration),
                    IF(:minDuration IS NULL AND :maxDuration IS NOT NULL,
                        (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) <= :maxDuration),
                        IF(:minDuration IS NOT NULL AND :maxDuration IS NULL,
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= :minDuration),
                            (TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) >= 0))))
                    AND IF(:start IS NOT NULL AND :stop IS NOT NULL,
                    (b.start BETWEEN :start AND :stop)
                        OR (b.stop BETWEEN :start AND :stop),
                    IF(:start IS NULL AND :stop IS NOT NULL,
                        (b.start <= :stop) OR (b.stop <= :stop),
                        IF(:start IS NOT NULL AND :stop IS NULL,
                            (b.start >= :start)
                                OR (b.stop >= :start),
                            (b.start >= 0))))
                    AND d.category IN (:category)
                    AND b.closed = 1
            GROUP BY bd.descriptor_id
            ORDER BY breakdownCount DESC
        ";


        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $rsm->addScalarResult('label', 'label');
        $rsm->addScalarResult('breakdownLengthRatio', 'breakdownLengthRatio');
        $rsm->addScalarResult('breakdownsList', 'breakdownsList');
        $rsm->addScalarResult('breakdownCount', 'breakdownCount');
        $rsm->addScalarResult('breakdownOccuranceRatio', 'breakdownOccuranceRatio');
        $query = $em->createNativeQuery($sql, $rsm);
        $query->setParameter('start', $start);
        $query->setParameter('stop', $stop);
        $query->setParameter('minDuration', $minDuration);
        $query->setParameter('maxDuration', $maxDuration);
        $query->setParameter('category', $categoryIn);
        return $query->getScalarResult();
    }

    public function ManagerNodes($descriptor)
    {
    $sql = "

SELECT count(label) as valueField,label as labelField,d1.category as categoryField,d1.id as idField,d1.category as categoryField  FROM breakdown b1
LEFT JOIN breakdowns_descriptors bd1 ON bd1.breakdown_id = b1.id
LEFT JOIN descriptor d1 ON bd1.descriptor_id = d1.id
WHERE   b1.id IN (
SELECT
    breakdown_id
FROM
    (SELECT
        b.id AS breakdown_id, d.label AS label, d.id
    FROM
        breakdown b
    LEFT JOIN breakdowns_descriptors bd ON bd.breakdown_id = b.id
    LEFT JOIN descriptor d ON bd.descriptor_id = d.id
    HAVING d.id = :descriptor_id) findBreakdowns
    )
group by d1.id
";
         $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('idField', 'idField');
        $rsm->addScalarResult('labelField', 'labelField');
        $rsm->addScalarResult('valueField', 'valueField');
        $rsm->addScalarResult('categoryField', 'categoryField');

        $query = $em->createNativeQuery($sql, $rsm);


        $query->setParameter('descriptor_id', $descriptor->getId());

        return $query->getScalarResult();
    }
    public function ManagerEdges($descriptor)
    {
    $sql = "SELECT DISTINCT
        LEAST(id1, id2) AS fromField,
        GREATEST(id2, id1) AS toField,
        (SELECT
                COUNT(b.id)
            FROM
                breakdown b
            WHERE

                b.id IN (
                SELECT
            b.id AS breakdown_id
        FROM
            breakdown b
        LEFT JOIN breakdowns_descriptors bd ON bd.breakdown_id = b.id
        LEFT JOIN descriptor d ON bd.descriptor_id = d.id
        WHERE d.id = :descriptor_id)

                    AND EXISTS( SELECT
                        1
                    FROM
                        breakdowns_descriptors bd
                    WHERE
                        b.id = bd.breakdown_id
                            AND bd.descriptor_id = id1)
                    AND EXISTS( SELECT
                        1
                    FROM
                        breakdowns_descriptors bd
                    WHERE
                             b.id = bd.breakdown_id
                            AND bd.descriptor_id = id2)) AS valueField
    FROM
        (SELECT
            d1.id AS id1, d2.id AS id2
        FROM
            descriptor d1
        LEFT JOIN descriptor d2 ON d1.id != d2.id) s1
    HAVING valueField > 0
    ORDER BY id1;";

        $em = $this->getEntityManager();
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('fromField', 'fromField');
        $rsm->addScalarResult('toField', 'toField');
        $rsm->addScalarResult('valueField', 'valueField');

        $query = $em->createNativeQuery($sql, $rsm);

        $query->setParameter('descriptor_id', $descriptor->getId());

        return $query->getScalarResult();
    }
}
