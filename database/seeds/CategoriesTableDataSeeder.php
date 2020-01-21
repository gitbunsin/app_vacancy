<?php

use App\Model\JobCategory;
use Illuminate\Database\Seeder;

class CategoriesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            "Accounting",
            "Administration",
            "Architecture/Engineering",
            "Assistant/Secretary",
            "Audit/Taxation",
            "Bank/Insurance",
            "Cashier/Receptionist ",
            "Catering/Restaurant",
            "Consultancy",
            "Cook/Cleaner/Maid",
            "Customer Service",
            "Design",
            "Driver/Security",
            "Education/Training",
            "Finance",
            "Hotel/Hospitality",
            "Human Resource",
            "IT",
            "Lawyer/Legal Service",
            "Logistics/Shipping/Deliver/Warehouse",
            "Management",
            "Manufacturing",
            "Marketing",
            "Media/Advertising",
            "Operation/Production",
            "Others",
            "Project Management",
            "QC/QA",
            "Resort/Casino",
            "Sales",
            "Technician/Maintenance",
            "Telecommunication",
            "Translation/Interpretation",
            "Travel Agent/Ticket Sales",

        );

        for ($i=0; $i < count($array); $i++) {
            JobCategory::create([
                'name' => $array[$i],
                'admin_id'=>1
            ]);
        }
    }
}
