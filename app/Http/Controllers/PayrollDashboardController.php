<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollDashboardController extends Controller
{
    //
    public function index()
    {
        $names = array(array('data_id' => '1', 'first_name' => 'Simone Roy', 'surname' => 'Abello', 'position' => 'Detective', 'department' => 'Police Department', 'gender' => 'Male', 'age' => '20', 'salary_grade' => '10', 'emp_id' => '22-1114-142', 'birthdate' => 'Feb 8, 2004', 'mobile_no' => '09362451314', 'email' => 'abello@gmail.com', 'date_of_hire' => 'Jul 29, 2023', 'address' => 'Blk 16, Lot 35, Sapphire St., Lorenville Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '2', 'first_name' => 'Maria Clara', 'surname' => 'Santos', 'position' => 'Officer', 'department' => 'Police Department', 'gender' => 'Female', 'age' => '25', 'salary_grade' => '9', 'emp_id' => '22-1123-143', 'birthdate' => 'May 12, 1998', 'mobile_no' => '09372451315', 'email' => 'santosmaria@gmail.com', 'date_of_hire' => 'Sep 2, 2022', 'address' => 'Blk 7, Lot 12, Emerald Ave., Green Heights, Cab. City, Nueva Ecija'),
        array('data_id' => '3', 'first_name' => 'Jonathan Michael', 'surname' => 'Perez', 'position' => 'Sergeant', 'department' => 'Criminal Investigation', 'gender' => 'Male', 'age' => '30', 'salary_grade' => '12', 'emp_id' => '22-1150-144', 'birthdate' => 'Jan 18, 1993', 'mobile_no' => '09383451316', 'email' => 'jonperez@yahoo.com', 'date_of_hire' => 'Feb 15, 2020', 'address' => 'Blk 4, Lot 22, Ruby St., Riverside Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '4', 'first_name' => 'Ariana Belle', 'surname' => 'Gonzales', 'position' => 'Chief Inspector', 'department' => 'Forensic Investigation', 'gender' => 'Female', 'age' => '35', 'salary_grade' => '15', 'emp_id' => '22-1185-145', 'birthdate' => 'Oct 30, 1988', 'mobile_no' => '09394551317', 'email' => 'ariana.gonzales@police.gov', 'date_of_hire' => 'Mar 5, 2015', 'address' => 'Blk 9, Lot 14, Topaz St., Oakwood Village, Cab. City, Nueva Ecija'),
        array('data_id' => '5', 'first_name' => 'Carlos Alberto', 'surname' => 'Rodriguez', 'position' => 'Lieutenant', 'department' => 'Police Department', 'gender' => 'Male', 'age' => '40', 'salary_grade' => '14', 'emp_id' => '22-1222-146', 'birthdate' => 'Apr 25, 1983', 'mobile_no' => '09398651318', 'email' => 'carlos.rodriguez@police.gov', 'date_of_hire' => 'Jun 18, 2010', 'address' => 'Blk 5, Lot 20, Diamond St., Midtown Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '6', 'first_name' => 'Katherine Jane', 'surname' => 'Torres', 'position' => 'Captain', 'department' => 'Operations', 'gender' => 'Female', 'age' => '32', 'salary_grade' => '13', 'emp_id' => '22-1287-147', 'birthdate' => 'Aug 3, 1991', 'mobile_no' => '09375451319', 'email' => 'katherinetorres@gmail.com', 'date_of_hire' => 'Dec 14, 2014', 'address' => 'Blk 2, Lot 8, Topaz St., Lakeside Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '7', 'first_name' => 'Michael Andrew', 'surname' => 'Santiago', 'position' => 'Inspector', 'department' => 'Traffic Division', 'gender' => 'Male', 'age' => '28', 'salary_grade' => '11', 'emp_id' => '22-1334-148', 'birthdate' => 'Feb 20, 1995', 'mobile_no' => '09381251320', 'email' => 'michaelsantiago@gmail.com', 'date_of_hire' => 'Apr 11, 2019', 'address' => 'Blk 13, Lot 3, Sunset St., Golden Valley, Cab. City, Nueva Ecija'),
        array('data_id' => '8', 'first_name' => 'Eva Louise', 'surname' => 'Villanueva', 'position' => 'Detective', 'department' => 'Cyber Crime', 'gender' => 'Female', 'age' => '27', 'salary_grade' => '12', 'emp_id' => '22-1390-149', 'birthdate' => 'Nov 15, 1996', 'mobile_no' => '09397351321', 'email' => 'evalouise.villanueva@gmail.com', 'date_of_hire' => 'Mar 22, 2021', 'address' => 'Blk 1, Lot 7, Amethyst Rd., Crystal Garden, Cab. City, Nueva Ecija'),
        array('data_id' => '9', 'first_name' => 'Andres Luis', 'surname' => 'Martinez', 'position' => 'Sergeant', 'department' => 'K9 Unit', 'gender' => 'Male', 'age' => '33', 'salary_grade' => '12', 'emp_id' => '22-1412-150', 'birthdate' => 'Jan 7, 1990', 'mobile_no' => '09362451322', 'email' => 'andres.martinez@police.gov', 'date_of_hire' => 'Sep 15, 2016', 'address' => 'Blk 8, Lot 18, Forest St., Hilltop Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '10', 'first_name' => 'Isabel Maria', 'surname' => 'Fernandez', 'position' => 'Lieutenant', 'department' => 'Anti-Narcotics', 'gender' => 'Female', 'age' => '31', 'salary_grade' => '13', 'emp_id' => '22-1445-151', 'birthdate' => 'Dec 24, 1992', 'mobile_no' => '09382351323', 'email' => 'isabel.fernandez@police.gov', 'date_of_hire' => 'Oct 10, 2015', 'address' => 'Blk 11, Lot 5, Gold Coast Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '11', 'first_name' => 'Joshua Ethan', 'surname' => 'Rivera', 'position' => 'Captain', 'department' => 'Special Operations', 'gender' => 'Male', 'age' => '38', 'salary_grade' => '14', 'emp_id' => '22-1503-152', 'birthdate' => 'Jul 18, 1985', 'mobile_no' => '09363151324', 'email' => 'joshua.rivera@police.gov', 'date_of_hire' => 'Nov 13, 2012', 'address' => 'Blk 6, Lot 25, Highland Rd., Riverside Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '12', 'first_name' => 'Victor Hugo', 'surname' => 'Castro', 'position' => 'Lieutenant Colonel', 'department' => 'Internal Affairs', 'gender' => 'Male', 'age' => '42', 'salary_grade' => '16', 'emp_id' => '22-1572-153', 'birthdate' => 'Jun 10, 1981', 'mobile_no' => '09374551325', 'email' => 'victor.castro@police.gov', 'date_of_hire' => 'Aug 28, 2010', 'address' => 'Blk 14, Lot 3, Diamond Ave., Summit Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '13', 'first_name' => 'Alfredo Luis', 'surname' => 'Morales', 'position' => 'Detective', 'department' => 'Homicide', 'gender' => 'Male', 'age' => '26', 'salary_grade' => '10', 'emp_id' => '22-1600-154', 'birthdate' => 'Sep 8, 1997', 'mobile_no' => '09385551326', 'email' => 'alfredomorales@police.gov', 'date_of_hire' => 'Jan 5, 2022', 'address' => 'Blk 17, Lot 8, Sunset View, Golden Hills, Cab. City, Nueva Ecija'),
        array('data_id' => '14', 'first_name' => 'Samantha Grace', 'surname' => 'Garcia', 'position' => 'Inspector', 'department' => 'Records', 'gender' => 'Female', 'age' => '29', 'salary_grade' => '11', 'emp_id' => '22-1623-155', 'birthdate' => 'Mar 11, 1994', 'mobile_no' => '09381251327', 'email' => 'samantha.garcia@police.gov', 'date_of_hire' => 'Jun 6, 2017', 'address' => 'Blk 3, Lot 15, Oakwood Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '15', 'first_name' => 'Luis Manuel', 'surname' => 'Torres', 'position' => 'Lieutenant', 'department' => 'Public Affairs', 'gender' => 'Male', 'age' => '37', 'salary_grade' => '13', 'emp_id' => '22-1657-156', 'birthdate' => 'Jan 19, 1986', 'mobile_no' => '09373251328', 'email' => 'luis.manuel@police.gov', 'date_of_hire' => 'May 22, 2013', 'address' => 'Blk 10, Lot 7, Sunrise St., Maple Grove, Cab. City, Nueva Ecija'),
        array('data_id' => '16', 'first_name' => 'Natalie Irene', 'surname' => 'Reyes', 'position' => 'Officer', 'department' => 'Patrol Division', 'gender' => 'Female', 'age' => '24', 'salary_grade' => '9', 'emp_id' => '22-1692-157', 'birthdate' => 'Jul 2, 1999', 'mobile_no' => '09382151329', 'email' => 'natalie.reyes@police.gov', 'date_of_hire' => 'Mar 14, 2023', 'address' => 'Blk 3, Lot 22, Silver St., Riverside Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '17', 'first_name' => 'Oscar Elias', 'surname' => 'Alvarez', 'position' => 'Captain', 'department' => 'Criminal Investigation', 'gender' => 'Male', 'age' => '35', 'salary_grade' => '13', 'emp_id' => '22-1735-158', 'birthdate' => 'Feb 10, 1988', 'mobile_no' => '09373451330', 'email' => 'oscar.alvarez@police.gov', 'date_of_hire' => 'Jul 8, 2014', 'address' => 'Blk 15, Lot 18, Mountain View, Cab. City, Nueva Ecija'),
        array('data_id' => '18', 'first_name' => 'Miriam Sophia', 'surname' => 'López', 'position' => 'Lieutenant', 'department' => 'Administration', 'gender' => 'Female', 'age' => '31', 'salary_grade' => '12', 'emp_id' => '22-1789-159', 'birthdate' => 'Aug 15, 1992', 'mobile_no' => '09380151331', 'email' => 'miriam.lopez@police.gov', 'date_of_hire' => 'Apr 20, 2016', 'address' => 'Blk 4, Lot 30, Seaside Rd., Bayview Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '19', 'first_name' => 'Ricardo Manuel', 'surname' => 'Gomez', 'position' => 'Detective', 'department' => 'Anti-Terrorism', 'gender' => 'Male', 'age' => '32', 'salary_grade' => '12', 'emp_id' => '22-1812-160', 'birthdate' => 'Nov 22, 1991', 'mobile_no' => '09381351332', 'email' => 'ricardo.gomez@police.gov', 'date_of_hire' => 'Feb 10, 2015', 'address' => 'Blk 6, Lot 13, Beachside Rd., Oceanfront Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '20', 'first_name' => 'Beatriz Dolores', 'surname' => 'Mendoza', 'position' => 'Sergeant', 'department' => 'Special Weapons and Tactics (SWAT)', 'gender' => 'Female', 'age' => '29', 'salary_grade' => '11', 'emp_id' => '22-1853-161', 'birthdate' => 'Oct 25, 1994', 'mobile_no' => '09384551333', 'email' => 'beatriz.mendoza@police.gov', 'date_of_hire' => 'Jan 18, 2018', 'address' => 'Blk 11, Lot 9, Pine Rd., Mountain View, Cab. City, Nueva Ecija'),
        array('data_id' => '21', 'first_name' => 'Fernando Antonio', 'surname' => 'Guerra', 'position' => 'Lieutenant Colonel', 'department' => 'Legal Affairs', 'gender' => 'Male', 'age' => '40', 'salary_grade' => '16', 'emp_id' => '22-1892-162', 'birthdate' => 'Sep 9, 1983', 'mobile_no' => '09384551334', 'email' => 'fernando.guerra@police.gov', 'date_of_hire' => 'Jun 7, 2010', 'address' => 'Blk 19, Lot 5, Greenfield St., Riverdale, Cab. City, Nueva Ecija'),
        array('data_id' => '22', 'first_name' => 'Sofia Luciana', 'surname' => 'Ramirez', 'position' => 'Officer', 'department' => 'Public Affairs', 'gender' => 'Female', 'age' => '25', 'salary_grade' => '9', 'emp_id' => '22-1933-163', 'birthdate' => 'Mar 5, 1998', 'mobile_no' => '09388751335', 'email' => 'sofia.ramirez@police.gov', 'date_of_hire' => 'Aug 3, 2020', 'address' => 'Blk 8, Lot 12, Magnolia St., Harmony Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '23', 'first_name' => 'Isidro José', 'surname' => 'Fernandez', 'position' => 'Inspector', 'department' => 'Firearms and Explosives', 'gender' => 'Male', 'age' => '36', 'salary_grade' => '12', 'emp_id' => '22-1965-164', 'birthdate' => 'Apr 20, 1987', 'mobile_no' => '09375651336', 'email' => 'isidro.fernandez@police.gov', 'date_of_hire' => 'Mar 15, 2015', 'address' => 'Blk 2, Lot 4, Sunrise Ave., Westgate Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '24', 'first_name' => 'Antonio Miguel', 'surname' => 'Zapata', 'position' => 'Lieutenant', 'department' => 'Human Resources', 'gender' => 'Male', 'age' => '34', 'salary_grade' => '12', 'emp_id' => '22-2002-165', 'birthdate' => 'Feb 18, 1989', 'mobile_no' => '09372151337', 'email' => 'antonio.zapata@police.gov', 'date_of_hire' => 'Oct 11, 2013', 'address' => 'Blk 3, Lot 19, Seabreeze Rd., Pacific View, Cab. City, Nueva Ecija'),
        array('data_id' => '25', 'first_name' => 'Guillermo Enrique', 'surname' => 'Martinez', 'position' => 'Detective', 'department' => 'Homicide Division', 'gender' => 'Male', 'age' => '33', 'salary_grade' => '12', 'emp_id' => '22-2040-166', 'birthdate' => 'Jan 2, 1990', 'mobile_no' => '09377751338', 'email' => 'guillermo.martinez@police.gov', 'date_of_hire' => 'Jun 5, 2016', 'address' => 'Blk 10, Lot 2, Maple St., Northgate Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '26', 'first_name' => 'Juliana Beatriz', 'surname' => 'Vega', 'position' => 'Sergeant', 'department' => 'Patrol Division', 'gender' => 'Female', 'age' => '27', 'salary_grade' => '11', 'emp_id' => '22-2083-167', 'birthdate' => 'May 28, 1996', 'mobile_no' => '09374651339', 'email' => 'juliana.vega@police.gov', 'date_of_hire' => 'Dec 14, 2019', 'address' => 'Blk 6, Lot 14, Rosewood St., Evergreen Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '27', 'first_name' => 'David Gabriel', 'surname' => 'Castillo', 'position' => 'Lieutenant', 'department' => 'Operations Division', 'gender' => 'Male', 'age' => '39', 'salary_grade' => '13', 'emp_id' => '22-2120-168', 'birthdate' => 'Oct 9, 1984', 'mobile_no' => '09382351340', 'email' => 'david.castillo@police.gov', 'date_of_hire' => 'Aug 17, 2012', 'address' => 'Blk 14, Lot 10, Parkview St., Hillside Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '28', 'first_name' => 'Carmen Lucia', 'surname' => 'Lopez', 'position' => 'Officer', 'department' => 'Public Safety', 'gender' => 'Female', 'age' => '26', 'salary_grade' => '9', 'emp_id' => '22-2155-169', 'birthdate' => 'Mar 8, 1997', 'mobile_no' => '09382151341', 'email' => 'carmen.lopez@police.gov', 'date_of_hire' => 'May 9, 2020', 'address' => 'Blk 7, Lot 22, Crystal Rd., Mountainview Subd., Cab. City, Nueva Ecija'),
        array('data_id' => '29', 'first_name' => 'Esteban Mario', 'surname' => 'Pérez', 'position' => 'Sergeant', 'department' => 'Intelligence Unit', 'gender' => 'Male', 'age' => '34', 'salary_grade' => '11', 'emp_id' => '22-2184-170', 'birthdate' => 'Apr 12, 1989', 'mobile_no' => '09387651342', 'email' => 'esteban.perez@police.gov', 'date_of_hire' => 'Jul 3, 2017', 'address' => 'Blk 9, Lot 4, Beacon St., Summit Ridge, Cab. City, Nueva Ecija'),
        array('data_id' => '30', 'first_name' => 'Teresa Isabel', 'surname' => 'Diaz', 'position' => 'Inspector', 'department' => 'Criminal Investigation', 'gender' => 'Female', 'age' => '32', 'salary_grade' => '12', 'emp_id' => '22-2215-171', 'birthdate' => 'Jun 24, 1991', 'mobile_no' => '09378951343', 'email' => 'teresa.diaz@police.gov', 'date_of_hire' => 'Oct 1, 2015', 'address' => 'Blk 3, Lot 18, Violet Rd., Hillside Subd., Cab. City, Nueva Ecija'),);
        return view('payroll_dashboard')->with('names', $names);
    }
}
