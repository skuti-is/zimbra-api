<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Struct;

use Zimbra\Utils\SimpleXML;
use Zimbra\Utils\TypedSequence;

/**
 * WaitSetAdd class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class WaitSetAdd
{
    /**
     * Attributes
     * @var TypedSequence<WaitSetAddSpec>
     */
    private $_a;

    /**
     * Constructor method for WaitSetAdd
     * @param array $a
     * @return self
     */
    public function __construct(array $a = array())
    {
        $this->_a = new TypedSequence('Zimbra\Soap\Struct\WaitSetAddSpec', $a);
    }

    /**
     * Add WaitSet
     *
     * @param  WaitSetAddSpec $a
     * @return self
     */
    public function addWaitSet(WaitSetAddSpec $a)
    {
        $this->_a->add($a);
        return $this;
    }

    /**
     * Get WaitSet sequence
     *
     * @return TypedSequence<WaitSetAddSpec>
     */
    public function a()
    {
        return $this->_a;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray($name = 'add')
    {
        $name = !empty($name) ? $name : 'add';
        $arr = array();
        if(count($this->_a))
        {
            $arr['a'] = array();
            foreach ($this->_a as $a)
            {
                $attrArr = $a->toArray('a');
                $arr['a'][] = $attrArr['a'];
            }
        }

        return array($name => $arr);
    }

    /**
     * Method returning the xml representative this class
     *
     * @return SimpleXML
     */
    public function toXml($name = 'add')
    {
        $name = !empty($name) ? $name : 'add';
        $xml = new SimpleXML('<'.$name.' />');
        foreach ($this->_a as $a)
        {
            $xml->append($a->toXml('a'));
        }

        return $xml;
    }

    /**
     * Method returning the xml string representative this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toXml()->asXml();
    }
}
