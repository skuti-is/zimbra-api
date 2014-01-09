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

/**
 * SnoozeAlarm struct class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class SnoozeAlarm
{
    /**
     * Calendar item ID
     * @var string
     */
    private $_id;

    /**
     * When to show the alarm again in milliseconds since the epoch
     * @var int
     */
    private $_until;

    /**
     * Constructor method for SnoozeAlarm
     * @param string $id
     * @param int $until
     * @return self
     */
    public function __construct($id, $until)
    {
        $this->_id = trim($id);
        $this->_until = (int) $until;
    }

    /**
     * Get or set id
     *
     * @param  string $id
     * @return string|self
     */
    public function id($id = null)
    {
        if(null === $id)
        {
            return $this->_id;
        }
        $this->_id = trim($id);
        return $this;
    }

    /**
     * Get or set until
     *
     * @param  int $until
     * @return int|self
     */
    public function until($until = null)
    {
        if(null === $until)
        {
            return $this->_until;
        }
        $this->_until = (int) $until;
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'alarm')
    {
        $name = !empty($name) ? $name : 'alarm';
        $arr =  array(
            'id' => $this->_id,
            'until' => $this->_until,
        );
        return array($name => $arr);
    }

    /**
     * Method returning the xml representation of this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'alarm')
    {
        $name = !empty($name) ? $name : 'alarm';
        $xml = new SimpleXML('<'.$name.' />');
        $xml->addAttribute('id', $this->_id)
            ->addAttribute('until', $this->_until);
        return $xml;
    }

    /**
     * Method returning the xml string representation of this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toXml()->asXml();
    }
}
