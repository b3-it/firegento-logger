<?php

class FireGento_Logger_Model_Stdout extends FireGento_Logger_Model_Abstract
{
    /**
     * Write a message to the stdout.
     *
     * @param array $event Event Data
     * @throws Zend_Log_Exception
     */
    protected function _write($event)
    {
        $event = Mage::helper('firegento_logger')->getEventObjectFromArray($event);
        $line = $this->_formatter->format($event);

        if (false === file_put_contents('php://stdout', $line)) {
            throw new Zend_Log_Exception("Unable to write to stdout");
        }
    }
}