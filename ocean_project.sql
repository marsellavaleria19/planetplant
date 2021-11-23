-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 10:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocean_project`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION ` sf_formatBulan` (`bulan` INT(2)) RETURNS VARCHAR(255) CHARSET utf8mb4 NO SQL
BEGIN
  DECLARE varhasil varchar(255);

  SELECT
    CASE bulan 
      WHEN 1 THEN 'Januari' 
      WHEN 2 THEN 'Februari' 
      WHEN 3 THEN 'Maret' 
      WHEN 4 THEN 'April' 
      WHEN 5 THEN 'Mei' 
      WHEN 6 THEN 'Juni' 
      WHEN 7 THEN 'Juli' 
      WHEN 8 THEN 'Agustus' 
      WHEN 9 THEN 'September'
      WHEN 10 THEN 'Oktober' 
      WHEN 11 THEN 'November' 
      WHEN 12 THEN 'Desember' 
    END INTO varhasil;

  RETURN varhasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION ` sf_formatTanggal` (`tanggal` DATE) RETURNS VARCHAR(255) CHARSET armscii8 NO SQL
BEGIN
  DECLARE varhasil varchar(255);

  SELECT CONCAT(
    CASE DAYOFWEEK(tanggal)
      WHEN 1 THEN 'Minggu'
      WHEN 2 THEN 'Senin'
      WHEN 3 THEN 'Selasa'
      WHEN 4 THEN 'Rabu'
      WHEN 5 THEN 'Kamis'
      WHEN 6 THEN 'Jumat'
      WHEN 7 THEN 'Sabtu'
    END,', ',
    DAY(tanggal),' ',
    CASE MONTH(tanggal) 
      WHEN 1 THEN 'Januari' 
      WHEN 2 THEN 'Februari' 
      WHEN 3 THEN 'Maret' 
      WHEN 4 THEN 'April' 
      WHEN 5 THEN 'Mei' 
      WHEN 6 THEN 'Juni' 
      WHEN 7 THEN 'Juli' 
      WHEN 8 THEN 'Agustus' 
      WHEN 9 THEN 'September'
      WHEN 10 THEN 'Oktober' 
      WHEN 11 THEN 'November' 
      WHEN 12 THEN 'Desember' 
    END,' ',
    YEAR(tanggal)
  ) INTO varhasil;

  RETURN varhasil;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `confirmationpaymentviews`
-- (See below for the actual view)
--
CREATE TABLE `confirmationpaymentviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `countitemtypeviews`
-- (See below for the actual view)
--
CREATE TABLE `countitemtypeviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemviews`
-- (See below for the actual view)
--
CREATE TABLE `itemviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `receiverviews`
-- (See below for the actual view)
--
CREATE TABLE `receiverviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportcountdata`
-- (See below for the actual view)
--
CREATE TABLE `reportcountdata` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportproductorders`
-- (See below for the actual view)
--
CREATE TABLE `reportproductorders` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportsellingorders`
-- (See below for the actual view)
--
CREATE TABLE `reportsellingorders` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `returviews`
-- (See below for the actual view)
--
CREATE TABLE `returviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `shippingviews`
-- (See below for the actual view)
--
CREATE TABLE `shippingviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactiondetailviews`
-- (See below for the actual view)
--
CREATE TABLE `transactiondetailviews` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactionviews`
-- (See below for the actual view)
--
CREATE TABLE `transactionviews` (
);

-- --------------------------------------------------------

--
-- Structure for view `confirmationpaymentviews`
--
DROP TABLE IF EXISTS `confirmationpaymentviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `confirmationpaymentviews`  AS SELECT `cp`.`id` AS `id`, `cp`.`code` AS `code`, `cp`.`name` AS `name`, `cp`.`id_transaction` AS `id_transaction`, `tr`.`codetransaction` AS `codetransaction`, `cp`.`transfer_date` AS `transfer_date`, `cp`.`slip_transfer` AS `slip_transfer`, `cp`.`payment` AS `payment`, `cp`.`total_bill` AS `total_bill`, `cp`.`id_payment_type` AS `id_payment_type`, `pt`.`type` AS `type`, `cp`.`confirmation_status` AS `confirmation_status`, `sc`.`status` AS `status`, `cp`.`notes` AS `notes` FROM (((`confirmationpayments` `cp` join `transactions` `tr` on(`tr`.`id` = `cp`.`id_transaction`)) join `paymenttypes` `pt` on(`pt`.`id` = `cp`.`id_payment_type`)) join `statusconfirmations` `sc` on(`sc`.`id` = `cp`.`confirmation_status`)) ;

-- --------------------------------------------------------

--
-- Structure for view `countitemtypeviews`
--
DROP TABLE IF EXISTS `countitemtypeviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `countitemtypeviews`  AS SELECT `it`.`id` AS `id`, `it`.`name` AS `name`, `it`.`cover` AS `cover`, count(`i`.`id_type`) AS `jumlah` FROM (`itemtypes` `it` left join `items` `i` on(`it`.`id` = `i`.`id_type`)) WHERE `i`.`deleted_at` is null AND `it`.`deleted_at` is null GROUP BY `it`.`id`, `it`.`name`, `it`.`cover` ;

-- --------------------------------------------------------

--
-- Structure for view `itemviews`
--
DROP TABLE IF EXISTS `itemviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemviews`  AS SELECT `i`.`id` AS `id`, `i`.`code` AS `code`, `i`.`name` AS `name`, `i`.`qty` AS `qty`, `i`.`description` AS `description`, `i`.`photo` AS `photo`, `i`.`price` AS `price`, `i`.`price`- `i`.`price` * (`i`.`discount` / 100) AS `totalprice`, `i`.`discount` AS `discount`, `it`.`id` AS `idType`, `it`.`name` AS `tipeItem`, sum(`tr_i`.`qty`) AS `terjual`, `i`.`created_at` AS `created_at` FROM ((`items` `i` join `itemtypes` `it` on(`i`.`id_type` = `it`.`id`)) left join `transaction_items` `tr_i` on(`tr_i`.`id_item` = `i`.`id`)) WHERE `i`.`deleted_at` is null AND `tr_i`.`id_status_shipping` <> 3 GROUP BY `i`.`id`, `i`.`code`, `i`.`name`, `i`.`qty`, `i`.`description`, `i`.`photo`, `i`.`price`, `i`.`price`- `i`.`price` * (`i`.`discount` / 100), `i`.`discount`, `it`.`id`, `it`.`name` ORDER BY date_format(`i`.`created_at`,'%Y-%m-%d') DESC ;

-- --------------------------------------------------------

--
-- Structure for view `receiverviews`
--
DROP TABLE IF EXISTS `receiverviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `receiverviews`  AS SELECT `re`.`id` AS `id`, `re`.`title` AS `title`, `re`.`id_customer` AS `id_customer`, `re`.`firstname` AS `firstname`, `re`.`lastname` AS `lastname`, `re`.`address` AS `address`, `re`.`id_subdistric` AS `id_subdistric`, `s`.`nama` AS `subdistric`, `re`.`id_city` AS `id_city`, `c`.`nama` AS `city`, `re`.`id_province` AS `id_province`, `p`.`nama` AS `province`, `re`.`country` AS `country`, `re`.`postalcode` AS `postalcode`, `re`.`phonenumber` AS `phonenumber`, `re`.`main` AS `main` FROM (((`receivers` `re` join `subdistrics` `s` on(`s`.`id` = `re`.`id_subdistric`)) join `cities` `c` on(`c`.`id` = `re`.`id_city`)) join `provinces` `p` on(`p`.`id` = `re`.`id_province`)) WHERE `re`.`deleted_at` is null ;

-- --------------------------------------------------------

--
-- Structure for view `reportcountdata`
--
DROP TABLE IF EXISTS `reportcountdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportcountdata`  AS SELECT 'product' AS `name`, count(0) AS `jumlah` FROM `items` ;

-- --------------------------------------------------------

--
-- Structure for view `reportproductorders`
--
DROP TABLE IF EXISTS `reportproductorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportproductorders`  AS SELECT CASE END FROM (`transactions` `tr` join `transaction_items` `tr_i` on(`tr_i`.`id_transaction` = `tr`.`id`)) WHERE `tr`.`payment_status` = 5 AND `tr`.`id_status_shipping` = 4 GROUP BY month(`tr`.`transactiondate`) ;

-- --------------------------------------------------------

--
-- Structure for view `reportsellingorders`
--
DROP TABLE IF EXISTS `reportsellingorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportsellingorders`  AS SELECT CASE END FROM (`transactions` `tr` join `transaction_items` `tr_i` on(`tr_i`.`id_transaction` = `tr`.`id`)) WHERE `tr`.`payment_status` = 5 AND `tr`.`id_status_shipping` = 4 GROUP BY month(`tr`.`transactiondate`) ;

-- --------------------------------------------------------

--
-- Structure for view `returviews`
--
DROP TABLE IF EXISTS `returviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `returviews`  AS SELECT `r`.`id` AS `id`, `r`.`code` AS `code`, `r`.`id_transaction` AS `id_transaction`, `tr`.`codetransaction` AS `codetransaction`, `tr`.`id_customer` AS `id_customer`, `c`.`name` AS `customer_name`, `r`.`id_item` AS `id_item`, `i`.`code` AS `item_code`, `i`.`name` AS `item_name`, `r`.`id_status_retur` AS `id_status_retur`, `sr`.`status` AS `status_retur`, `r`.`qty` AS `qty`, `r`.`note` AS `note`, `r`.`returdate` AS `returdate` FROM ((((`returs` `r` join `transactions` `tr` on(`tr`.`id` = `r`.`id_transaction`)) join `items` `i` on(`i`.`id` = `r`.`id_item`)) join `statusreturs` `sr` on(`sr`.`id` = `r`.`id_status_retur`)) join `customers` `c` on(`c`.`id` = `tr`.`id_customer`)) ;

-- --------------------------------------------------------

--
-- Structure for view `shippingviews`
--
DROP TABLE IF EXISTS `shippingviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shippingviews`  AS SELECT `s`.`id` AS `id`, `s`.`code` AS `code`, `s`.`name` AS `name`, `s`.`price` AS `price`, `s`.`id_province` AS `id_province`, `p`.`nama` AS `province`, `s`.`id_city` AS `id_city`, `c`.`nama` AS `city`, `s`.`description` AS `description` FROM ((`shippings` `s` join `cities` `c` on(`c`.`id` = `s`.`id_city`)) join `provinces` `p` on(`p`.`id` = `s`.`id_province`)) WHERE `s`.`deleted_at` is null ;

-- --------------------------------------------------------

--
-- Structure for view `transactiondetailviews`
--
DROP TABLE IF EXISTS `transactiondetailviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactiondetailviews`  AS SELECT `tr_i`.`id` AS `id`, `tr_i`.`id_transaction` AS `id_transaction`, `tr_i`.`qty` AS `qty`, `tr_i`.`price` AS `price`, `tr_i`.`discount` AS `discount`, `tr_i`.`total_price` AS `total_price`, `tr_i`.`total` AS `total`, `tr_i`.`id_item` AS `id_item`, `i`.`code` AS `code_item`, `i`.`name` AS `name`, `tr`.`id_customer` AS `id_customer`, `tr_i`.`retur` AS `retur` FROM ((`transaction_items` `tr_i` join `items` `i` on(`tr_i`.`id_item` = `i`.`id`)) join `transactions` `tr` on(`tr`.`id` = `tr_i`.`id_transaction`)) ;

-- --------------------------------------------------------

--
-- Structure for view `transactionviews`
--
DROP TABLE IF EXISTS `transactionviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactionviews`  AS SELECT `tr`.`id` AS `id`, `tr`.`codetransaction` AS `codetransaction`, `tr`.`id_customer` AS `id_customer`, `c`.`name` AS `customer`, `tr`.`transactiondate` AS `transactiondate`, `tr`.`id_billing` AS `id_billing`, `rb`.`firstname` AS `billing_firstname`, `rb`.`lastname` AS `billing_lastname`, `rb`.`address` AS `billing_address`, `pb`.`nama` AS `province_billing`, `cb`.`nama` AS `kota_billing`, `sub`.`nama` AS `kab_billing`, `rb`.`postalcode` AS `billing_postalcode`, `rb`.`phonenumber` AS `billing_phonenumber`, `rc`.`firstname` AS `receiver_firstname`, `rc`.`lastname` AS `receiver_lastname`, `rc`.`address` AS `receiver_address`, `pr`.`nama` AS `province_receiver`, `cr`.`nama` AS `kota_receiver`, `sur`.`nama` AS `kab_receiver`, `rc`.`postalcode` AS `postalcode`, `rc`.`postalcode` AS `receiver_postalcode`, `rc`.`phonenumber` AS `receiver_phonenumber`, `s`.`name` AS `shipping_name`, `tr`.`shipping_price` AS `shipping_price`, `ss`.`id` AS `id_status_shipping`, `ss`.`status` AS `status_shipping`, `sp`.`id` AS `id_status_payment`, `sp`.`status` AS `status_payment`, sum(`tr_i`.`total`) + `tr`.`shipping_price` AS `totalBill` FROM (((((((((((((`transactions` `tr` join `transaction_items` `tr_i` on(`tr`.`id` = `tr_i`.`id_transaction`)) join `customers` `c` on(`tr`.`id_customer` = `c`.`id`)) join `receivers` `rb` on(`tr`.`id_billing` = `rb`.`id`)) join `provinces` `pb` on(`pb`.`id` = `rb`.`id_province`)) join `cities` `cb` on(`cb`.`id` = `rb`.`id_city`)) join `subdistrics` `sub` on(`sub`.`id` = `rb`.`id_subdistric`)) join `receivers` `rc` on(`tr`.`id_billing` = `rc`.`id`)) join `provinces` `pr` on(`pr`.`id` = `rc`.`id_province`)) join `cities` `cr` on(`cr`.`id` = `rc`.`id_city`)) join `subdistrics` `sur` on(`sur`.`id` = `rc`.`id_subdistric`)) join `shippings` `s` on(`s`.`id` = `tr`.`id_shipping`)) join `statusshippings` `ss` on(`ss`.`id` = `tr`.`id_status_shipping`)) join `statuspayments` `sp` on(`sp`.`id` = `tr`.`payment_status`)) GROUP BY `tr`.`id`, `tr`.`codetransaction`, `tr`.`id_customer`, `c`.`name`, `tr`.`transactiondate`, `tr`.`id_billing`, `rb`.`firstname`, `rb`.`lastname`, `rb`.`address`, `pb`.`nama`, `cb`.`nama`, `sub`.`nama`, `rb`.`postalcode`, `rb`.`phonenumber`, `rc`.`firstname`, `rc`.`lastname`, `rc`.`address`, `pr`.`nama`, `cr`.`nama`, `sur`.`nama`, `rc`.`postalcode`, `rc`.`postalcode`, `rc`.`phonenumber`, `s`.`name`, `tr`.`shipping_price`, `ss`.`status`, `sp`.`status` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
