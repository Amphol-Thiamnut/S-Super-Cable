<?php

class HomepageController
{

    /**
     * handleRequest จะทำการตรวจสอบ action และพารามิเตอร์ที่ส่งเข้ามาจาก Router
     * แล้วทำการเรียกใช้เมธอดที่เหมาะสมเพื่อประมวลผลแล้วส่งผลลัพธ์กลับ
     *
     * @param string $action ชื่อ action ที่ผู้ใช้ต้องการทำ
     * @param array $params พารามิเตอร์ที่ใช้เพื่อในการทำ action หนึ่งๆ
     */
    public function handleRequest(string $action = "index", array $params)
    {
        switch ($action) {
            case "index":
                session_start();
                $employee = $_SESSION['employee'];

                if ($employee->getUser_Status_Employee() == "Admin") {
                    # find all employee
                    $user_count = count(Employee::findAll());
                    include Router::getSourcePath() . "views/index_admin.inc.php";
                } else if ($employee->getUser_Status_Employee() == "Sales") {

                    include Router::getSourcePath() . "views/index_sales.inc.php";
                } else if ($employee->getUser_Status_Employee() == "User") {

                    include Router::getSourcePath() . "views/index_user.inc.php";
                }
                break;
            default:
                break;
        }
    }

    private function error_handle(string $message)
    {
        $this->index($message);
    }


    // ควรมีสำหรับ controller ทุกตัว
    private function index($message)
    {
        include Router::getSourcePath() . "views/error_handle.inc.php";
    }

}