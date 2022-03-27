<?php
namespace Model\Manager\Traits;

use Model\DB;
use PDO;

trait ManagerTrait {
    private ?PDO $db;

    /**
     * ArticleManager constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }
}