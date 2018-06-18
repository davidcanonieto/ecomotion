<?php

    require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    $sql = "INSERT INTO categories (cat_code, fuel) VALUES ('01', 'electric');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('02', 'hybrid');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('03', 'petrol');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('04', 'diesel');";


$sql .= "INSERT INTO `users` (`id`, `email`, `password`, `name`, `lastname`, `foto`, `birthdate`, `wallet`) VALUES
(1, 'david.cano.nieto@gmail.com', '$2y$10$0/02orEh3TLUdPomKa0VzOYa/WfM6nriwuRE1LM4qZnxTv30IxgrW', 'David', 'Cano', 'vdsfsdfvdvdsfvdfvdfv.jpg', '1993-06-21', '23.00'),
(2, 'miguel.ruiz@gmail.com', '$2y$10$miGyxm346Noem/kzie0BtuL8H47C7lHJb2R2wxjN5eB9TAkdWbdFW', 'Miguel', 'Ruíz', 'fdsvdfvdfgb.jpg', '1993-06-03', '12.00'),
(3, 'ben.hill@gmail.com', '$2y$10$HnHQ56hMI1BL4P30YUMz9uAIomJrI9GHSGeap9rJFO3i0Rcl3EiGu', 'Ben', 'Hill', 'default.png', '1983-12-04', '6.30'),
(4, 'tim.tulse@gmail.com', '$2y$10$.QPadl/3bsV48u7mvlh/8.hG0l3rK0b.JWmkZFx4Gz1G2WaMygJva', 'Tim', 'Tulse', 'default.png', '1988-04-04', '2.00'),
(5, 'alvaro.sancho@gmail.com', '$2y$10$nm/Pw8YtEUHXKU5L4bhA4Oz.sn5b27rUxEzZxjME.Mp7l/f84VeC.', 'Alvaro', 'Sancho', 'ffvdfvdsfvdfsvsdfv.jpg', '1990-05-10', '0.00'),
(6, 'ramona.swiss@gmail.com', '$2y$10$lQaPXU1IXtrn0BbSKIjY/eZJZBTinBq3EJgMMmBIPCSf.JXwmeKXi', 'Ramona', 'Swiss', 'default.png', '1992-10-10', '0.00'),
(7, 'risky.pardieu@gmail.com', '$2y$10$JTaX2/vAp7dN1r2wL6xHTudbsm5x.OQallla7RNcvht.j3RpBIjNG', 'Risky', 'Pardieu', 'brverfvwefsefv.jpg', '1991-05-16', '123.00');";

$sql .= "INSERT INTO `cars` (`maker`, `model`, `picture`, `year`, `seats`, `license_plate`, `cat_code`) VALUES
('Tesla', 'X', 'USC60TSS011C021001.jpg', 2017, 6, '0024-JXZ', 1),
('Renault', 'Clio', 'cliorinault.jpeg', 2012, 4, '4354-FRT', 3),
('Porsche', '911', '410066221.jpg', 2017, 1, '9324-JJK', 3),
('Toyota', 'Prius', 'USC60TOC161D021001.png', 2014, 4, '9823-HTL', 2);";

$sql .= "INSERT INTO `possessions` (`id`, `license_plate`) VALUES
(7, '4354-FRT'),
(2, '9324-JJK'),
(5, '9823-HTL'),
(1, '0024-JXZ');";

$sql .= "INSERT INTO `trip_details` (`trip_code`, `id`, `trip_date`, `trip_time`, `status`, `origin_lat`, `origin_lng`, `destiny_lat`, `destiny_lng`, `seats`, `cost`) VALUES
(1, 1, '2018-06-20', '08:30', 'active', '40.678846600', '-3.616306100', '40.466420400', '-3.689530900', 4, '6.53'),
(2, 1, '2018-06-20', '13:30', 'active', '40.466420400', '-3.689530900', '40.491009600', '-3.715725100', 4, '3.10'),
(3, 1, '2018-06-20', '13:30', 'active', '40.491009600', '-3.715725100', '40.479993800', '-3.707478000', 6, '2.60'),
(4, 1, '2018-06-20', '13:30', 'active', '40.479993800', '-3.707478000', '40.453054100', '-3.688344500', 4, '3.46'),
(5, 2, '2018-06-20', '13:30', 'active', '40.466420400', '-3.689530900', '40.489660000', '-3.715630000', 1, '3.33'),
(6, 2, '2018-06-20', '13:30', 'active', '40.453054100', '-3.688344500', '40.416947300', '-3.703528500', 1, '6.45'),
(7, 7, '2018-06-18', '13:30', 'active', '40.466420400', '-3.689530900', '40.491344800', '-3.714250800', 3, '2.97'),
(8, 7, '2018-06-20', '13:30', 'active', '40.674742000', '-3.614874800', '40.466702800', '-3.688648900', 3, '7.46'),
(9, 5, '2018-06-22', '13:30', 'active', '40.453054100', '-3.688344500', '40.418299000', '-3.710578000', 4, '5.41'),
(10, 5, '2018-06-18', '13:30', 'active', '40.453054100', '-3.688344500', '40.418299000', '-3.710578000', 3, '5.41'),
(11, 5, '2018-06-18', '13:30', 'active', '40.678846600', '-3.616306100', '40.466420400', '-3.689530900', 2, '4.57');";



    if (mysqli_multi_query($conn, $sql)) {
        header("location:../backOffice.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    

    
    mysqli_close($conn);


?>