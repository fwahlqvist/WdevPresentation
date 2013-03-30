<?php
namespace WdevPresentation\Model;

use Zend\Db\TableGateway\TableGateway;

class PresentationTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPresentation($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function savePresentation(Presentation $presentation)
    {
        $data = array(
            'title' => $presentation->title,
            'content'  => $presentation->content,
        );

        $id = (int)$presentation->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getPresentation($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deletePresentation($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}