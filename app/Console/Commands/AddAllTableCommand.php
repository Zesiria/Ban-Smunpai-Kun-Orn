<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddAllTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::statement("CREATE TABLE COURSE (
            course_id INT(4) AUTO_INCREMENT,
            course_name VARCHAR(30) NOT NULL,
            course_description VARCHAR(256) NOT NULL,
            course_price INT(4) NOT NULL,

            PRIMARY KEY(course_id),
            CHECK(course_price > 0));"
        );

        DB::statement("CREATE TABLE CUSTOMER (
            customer_id INT(4) AUTO_INCREMENT,
        	customer_name VARCHAR(30) NOT NULL,
            password VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL,
            phone_number CHAR(10) NOT NULL,

            PRIMARY KEY(customer_id));"
        );

        DB::statement("CREATE TABLE EMPLOYEE (
            employee_id INT(4) AUTO_INCREMENT,
	        employee_name VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            phone_number CHAR(10) NOT NULL,

            PRIMARY KEY(employee_id));"
        );

        DB::statement("CREATE TABLE MATERIAL(
            material_id INT(4) AUTO_INCREMENT,
            material_name VARCHAR(30) NOT NULL,
            quantity INT(3) NOT NULL,
            minimum_value INT(3) NOT NULL,

            PRIMARY KEY(material_id),
            CHECK(quantity >= 0),
            CHECK(minimum_value >= 0));"
        );

        DB::statement("CREATE TABLE TOOL(
            tool_id INT(4) AUTO_INCREMENT,
            tool_name VARCHAR(30) NOT NULL,

            PRIMARY KEY(tool_id));"
        );

        DB::statement("CREATE TABLE TIME(
            date_time DATETIME NOT NULL,

            PRIMARY KEY(date_time));");

        DB::statement("CREATE TABLE QUEUE(
            employee_id INT(8) NOT NULL,
            date_time DATETIME NOT NULL,
            is_cancel Boolean DEFAULT FALSE NOT NULL,

            PRIMARY KEY(employee_id,date_time),
            FOREIGN KEY(employee_id) REFERENCES EMPLOYEE(employee_id) ON DELETE CASCADE,
            FOREIGN KEY(date_time) REFERENCES TIME(date_time) ON DELETE CASCADE);");

        DB::statement("CREATE TABLE SERVICE_ORDER (
            service_order_id INT(4) AUTO_INCREMENT,
            status INT(1) DEFAULT 1 NOT NULL,
            price INT(4) NOT NULL,
        	customer_id INT(4) NOT NULL,
            course_name VARCHAR(30) NOT NULL,
            employee_id INT(4) NOT NULL,
            date_time DATETIME NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,

            PRIMARY KEY(service_order_id),
            FOREIGN KEY(customer_id) REFERENCES CUSTOMER(customer_id) ON DELETE CASCADE,
            FOREIGN KEY(employee_id) REFERENCES EMPLOYEE(employee_id) ON DELETE CASCADE,
            FOREIGN KEY(date_time) REFERENCES TIME(date_time) ON DELETE CASCADE,
            CHECK(price >= 0));"
        );

        DB::statement("CREATE TABLE EMPLOYEE_REQUIRED(
            tool_id INT(4) NOT NULL,
            employee_id INT(4) NOT NULL,
            date_time_required DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,

            PRIMARY KEY(tool_id, employee_id, date_time_required),
            FOREIGN KEY(tool_id) REFERENCES TOOL(tool_id) ON DELETE CASCADE,
            FOREIGN KEY(employee_id) REFERENCES EMPLOYEE(employee_id) ON DELETE CASCADE);"
        );

        DB::statement("CREATE TABLE EMPLOYEE_USED(
            material_id INT(4) NOT NULL,
            employee_id INT(4) NOT NULL,
            date_time_required DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            quantity INT(3) NOT NULL,

            PRIMARY KEY(material_id, employee_id, date_time_required),
            FOREIGN KEY(material_id) REFERENCES MATERIAL(material_id) ON DELETE CASCADE,
            FOREIGN KEY(employee_id) REFERENCES EMPLOYEE(employee_id) ON DELETE CASCADE,
            CHECK(quantity >= 0));"
        );

        DB::statement("CREATE TABLE COURSE_USED(
            material_id INT(4) NOT NULL,
            course_id INT(4) NOT NULL,
            quantity INT(3) NOT NULL,

            PRIMARY KEY(material_id, course_id),
            FOREIGN KEY(material_id) REFERENCES MATERIAL(material_id) ON DELETE CASCADE,
            FOREIGN KEY(course_id) REFERENCES COURSE(course_id) ON DELETE CASCADE,
            CHECK(quantity >= 0));"
        );

        DB::statement("CREATE TABLE COURSE_REQUIRED(
            tool_id INT(4) NOT NULL,
            course_id INT(4) NOT NULL,

            PRIMARY KEY(tool_id, course_id),
            FOREIGN KEY(tool_id) REFERENCES TOOL(tool_id) ON DELETE CASCADE,
            FOREIGN KEY(course_id) REFERENCES COURSE(course_id) ON DELETE CASCADE);"
        );

        DB::statement("CREATE TABLE MANAGER (
            manager_id INT(4) AUTO_INCREMENT,
        	manager_name VARCHAR(30) NOT NULL,
            password VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL,
            phone_number CHAR(10) NOT NULL,

            PRIMARY KEY(manager_id));"
        );

        DB::insert("INSERT INTO MANAGER(manager_name, password, email, phone_number) VALUES('สมหญิง วิเชียรชาญ','somyingnaka','somyingnaka@em.com','0812003415')");
        return Command::SUCCESS;
    }
}
