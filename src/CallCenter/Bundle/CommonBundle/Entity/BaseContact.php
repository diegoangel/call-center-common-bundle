<?php

namespace CallCenter\Bundle\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use CallCenter\Bundle\CommonBundle\Traits\TimestampableEntity;
use CallCenter\Bundle\CommonBundle\Traits\SoftDeleteableEntity;
use CallCenter\Bundle\CommonBundle\DBAL\Types\GenderType;

/**
 * @ORM\MappedSuperclass
 * @Gedmo\SoftDeleteable(
 *      fieldName="deleted_at",
 *      timeAware=false
 * )
 * @Gedmo\Loggable
 */
abstract class BaseContact
{
    use SoftDeleteableEntity;
    use TimestampableEntity;

    /**
     * @ORN\Column(
     *      name="id",
     *      type="integer"
     * )
     * @ORM\Id
     * @ORM\GeneratedValue(
     *      strategy="IDENTITY
     * )
     */
    protected $id;

    /**
     * @ORM\Column(
     *      name="first_name",
     *      type="string"
     * )
     */
    protected $firstName;

    /**
     * @ORM\Column(
     *      name="last_name",
     *      type="string"
     * )
     */
    protected $lastName;

    /**
     * @ORM\Column(
     *      name="email",
     *      type="string"
     * )
     * @Gedmo\Versioned
     */
    protected $email;

    /**
     * @ORM\Column(
     *      name="phone_id",
     *      type="integer"
     * )
     */
    protected $phones;

    /**
     * @ORM\Column(
     *      name="gender",
     *      type="GenderType",
     *      nullable=false
     * )
     * @DoctrineAssert\Enum(
     *      entity="CallCenter\Bundle\CommonBundle\DBAL\Types\GenderType"
     * )
     */
    protected $gender;
}
