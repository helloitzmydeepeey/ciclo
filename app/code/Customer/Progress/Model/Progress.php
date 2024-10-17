<?php
namespace Customer\Progress\Model;

use Magento\Framework\Model\AbstractModel;
use Customer\Progress\Model\ResourceModel\Progress as ProgressResource;

class Progress extends AbstractModel
{
    protected $_eventPrefix = 'customer_progress_progress';

    protected function _construct()
    {
        $this->_init(ProgressResource::class);
    }

    public function calculateProgress()
    {
        $fields = [
            'email',
            'firstname',
            'lastname',
            'password_hash',
        ];

        $completedFields = 0;

        foreach ($fields as $field) {
            if ($this->getData($field)) {
                $completedFields++;
            }
        }

        return $completedFields / count($fields) * 100;
    }
}
